<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Feature;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Models\Media;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->paginate(10);
        return view('backEnd.admin.services.index', compact('services'));
    }

    public function create()
    {
        $features = Feature::where('status', 'active')->get();
        return view('backEnd.admin.services.create', compact('features'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:services,title',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        
        // Upload main image (meta_image in your form)
        if ($request->hasFile('meta_image')) {
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Create service
        $service = Service::create($data);

        // Create SEO record
        $service->seo()->create($data);

        // Attach features
        if ($request->filled('features')) {
            $service->features()->sync($request->features);
        }

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('parent_id', $service->id)
                ->where('parent_type', Service::class)
                ->where('is_default', true)
                ->exists();

            foreach ($request->file('media') as $key => $file) {
                Media::create([
                    'parent_type' => Service::class,
                    'parent_id' => $service->id,
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/services'),
                    'caption' => null,
                    'is_default' => !$hasDefault && $key === 0,
                ]);
                $hasDefault = true; // Set to true after first upload
            }
        }

        // Handle Attachments
        if ($request->hasFile('attachment_files')) {
            foreach ($request->file('attachment_files') as $index => $file) {
                $attachmentName = $request->attachment_names[$index] ?? $file->getClientOriginalName();
                
                Attachment::create([
                    'parent_type' => Service::class,
                    'parent_id' => $service->id,
                    'name' => $attachmentName,
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/attachments'),
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::with(['features', 'attachments', 'media'])->findOrFail($id);
        $features = Feature::where('status', 'active')->get();
        return view('backEnd.admin.services.edit', compact('service', 'features'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:services,title,' . $id,
            'description' => 'nullable|string'
        ]);

        $data = $request->all();

        // Handle OG image
        $ogImagePath = $service->seo->og_image ?? null;
        if ($request->hasFile('meta_image')) {
            // Delete old OG image if exists
            if ($ogImagePath && file_exists(public_path($ogImagePath))) {
                unlink(public_path($ogImagePath));
            }
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Update service
        $service->update($data);

        // Prepare SEO data - only include relevant fields
        $seoData = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'og_image' => $data['og_image'] ?? $ogImagePath,
        ];

        // Update or create SEO record
        if ($service->seo) {
            $service->seo()->update($seoData);
        } else {
            $service->seo()->create($seoData);
        }

        // Sync features
        if ($request->filled('features')) {
            $service->features()->sync($request->features);
        } else {
            $service->features()->detach();
        }

        // Handle default image selection
        if ($request->filled('is_default')) {
            // Reset all media to not default
            Media::where('parent_id', $service->id)
                ->where('parent_type', Service::class)
                ->update(['is_default' => false]);
                
            // Set the selected media as default
            if (str_starts_with($request->is_default, 'new_')) {
                // This is a new image, we'll handle it after upload
                $newDefaultFlag = true;
            } else {
                // This is an existing image
                Media::where('id', $request->is_default)
                    ->where('parent_id', $service->id)
                    ->where('parent_type', Service::class)
                    ->update(['is_default' => true]);
            }
        }

        // Handle Media deletion
        if ($request->filled('delete_media')) {
            foreach ($request->delete_media as $mediaId) {
                $media = Media::find($mediaId);
                if ($media && $media->parent_id == $service->id && $media->parent_type == Service::class) {
                    ImageHelper::deleteImage($media->file_path);
                    $media->delete();
                }
            }
        }

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('parent_id', $service->id)
                ->where('parent_type', Service::class)
                ->where('is_default', true)
                ->exists();

            foreach ($request->file('media') as $key => $file) {
                $isDefault = (!$hasDefault && $key === 0) || (isset($newDefaultFlag) && $newDefaultFlag);
                
                $media = Media::create([
                    'parent_type' => Service::class,
                    'parent_id' => $service->id,
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/services'),
                    'caption' => null,
                    'is_default' => $isDefault,
                ]);
                
                if ($isDefault) {
                    $hasDefault = true;
                    $newDefaultFlag = false;
                }
            }
        }

        // Handle Attachments deletion
        if ($request->filled('delete_attachments')) {
            foreach ($request->delete_attachments as $attachmentId) {
                $attachment = Attachment::find($attachmentId);
                if ($attachment && $attachment->parent_id == $service->id && $attachment->parent_type == Service::class) {
                    ImageHelper::deleteImage($attachment->file_path);
                    $attachment->delete();
                }
            }
        }

        // Update existing attachment files and names
        foreach ($request->file('existing_attachment_files', []) as $id => $file) {
            if ($file?->isValid() && $attachment = Attachment::where('id', $id)->where('parent_id', $service->id)->where('parent_type', Service::class)->first()) {
                // Delete old file
                ImageHelper::deleteImage($attachment->file_path);

                // Prepare data
                $updateData = ['file_path' => ImageHelper::uploadImage($file, 'uploads/attachments')];
                $updateData['name'] = $file->getClientOriginalName();

                // Update attachment
                $attachment->update($updateData);
            }
        }


        // Handle new Attachments
        if ($request->hasFile('new_attachment_files')) {
            foreach ($request->file('new_attachment_files') as $index => $file) {
                $attachmentName = $request->new_attachment_names[$index] ?? $file->getClientOriginalName();
                
                Attachment::create([
                    'parent_type' => Service::class,
                    'parent_id' => $service->id,
                    'name' => $attachmentName,
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/attachments'),
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::with(['seo', 'media', 'attachments'])->findOrFail($id);

        // Delete SEO OG image
        if ($og = $service->seo?->og_image) {
            ImageHelper::deleteImage($og);
            $service->seo()->delete();
        }

        // Delete media files
        foreach ($service->media as $media) {
            ImageHelper::deleteImage($media->file_path);
            $media->delete();
        }

        // Delete attachment files
        foreach ($service->attachments as $attachment) {
            ImageHelper::deleteImage($attachment->file_path);
            $attachment->delete();
        }

        // Detach related features (pivot table)
        $service->features()->detach();

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}