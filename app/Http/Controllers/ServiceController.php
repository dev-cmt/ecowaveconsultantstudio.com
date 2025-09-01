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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'features' => 'array|nullable',
            'media.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,pdf,doc,docx|max:5120',
            'attachment_files.*' => 'file|mimes:pdf,doc,docx,jpeg,png,jpg|max:5120',
            'attachment_names' => 'array|nullable',
        ]);

        // Upload main image
        if ($request->hasFile('image')) {
            $validated['image'] = ImageHelper::uploadImage($request->file('image'), 'uploads/services');
        }

        // Create service
        $service = Service::create($validated);

        // Attach features
        if ($request->filled('features')) {
            $service->features()->sync($request->features);
        }

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('parent_id', $service->id)
                ->where('parent_name', Service::class)
                ->where('is_default', true)
                ->exists();

            foreach ($request->file('media') as $key => $path) {
                Media::create([
                    'parent_name' => Service::class,
                    'parent_id' => $service->id,
                    'file_path' => ImageHelper::uploadImage($path, 'uploads/services'),
                    'caption' => $request->caption[$key] ?? null,
                    'is_default' => !$hasDefault && $key === 0,
                ]);
            }
        }

        // Handle Attachments
        if ($request->hasFile('attachment_files') && $request->filled('attachment_names')) {
            foreach ($request->file('attachment_files') as $index => $file) {
                Attachment::create([
                    'parent_name' => Service::class,
                    'parent_id' => $service->id,
                    'name' => $request->attachment_names[$index] ?? $file->getClientOriginalName(),
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/attachments'),
                ]);
            }
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
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

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'features' => 'array|nullable',
            'media.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,pdf,doc,docx|max:5120',
            'attachment_files.*' => 'file|mimes:pdf,doc,docx,jpeg,png,jpg|max:5120',
            'attachment_names' => 'array|nullable',
        ]);

        // Replace main image if new uploaded
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
            $validated['image'] = ImageHelper::uploadImage($request->file('image'), 'uploads/services');
        }

        // Update service
        $service->update($validated);

        // Sync features
        if ($request->filled('features')) {
            $service->features()->sync($request->features);
        } else {
            $service->features()->detach();
        }

        // Handle Media uploads (add new only, no delete here)
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('parent_id', $service->id)
                ->where('parent_name', Service::class)
                ->where('is_default', true)
                ->exists();

            foreach ($request->file('media') as $key => $path) {
                Media::create([
                    'parent_name' => Service::class,
                    'parent_id' => $service->id,
                    'file_path' => ImageHelper::uploadImage($path, 'uploads/services'),
                    'caption' => $request->caption[$key] ?? null,
                    'is_default' => !$hasDefault && $key === 0,
                ]);
            }
        }

        // Handle Attachments
        if ($request->hasFile('attachment_files') && $request->filled('attachment_names')) {
            foreach ($request->file('attachment_files') as $index => $file) {
                Attachment::create([
                    'parent_name' => Service::class,
                    'parent_id' => $service->id,
                    'name' => $request->attachment_names[$index] ?? $file->getClientOriginalName(),
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/attachments'),
                ]);
            }
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image file if exists
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
