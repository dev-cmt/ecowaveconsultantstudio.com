<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use App\Models\Category;
use App\Models\Media;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);
        return view('backEnd.admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::where('status', true)->get();
        return view('backEnd.admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        
        // Upload main image (meta_image in your form)
        if ($request->hasFile('meta_image')) {
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Create Project
        $project = Project::create($data);

        // Create SEO record
        $project->seo()->create($data);

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('parent_id', $project->id)
                ->where('parent_type', Project::class)
                ->where('is_default', true)
                ->exists();

            foreach ($request->file('media') as $key => $file) {
                Media::create([
                    'parent_type' => Project::class,
                    'parent_id' => $project->id,
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/projects'),
                    'caption' => null,
                    'is_default' => !$hasDefault && $key === 0,
                ]);
                $hasDefault = true; // Set to true after first upload
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Project::with(['category', 'media'])->findOrFail($id);
        $categories = Category::where('status', 'active')->get();
        return view('backEnd.admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title,' . $id,
            'description' => 'nullable|string'
        ]);

        $data = $request->all();

        // Handle OG image
        $ogImagePath = $project->seo->og_image ?? null;
        if ($request->hasFile('meta_image')) {
            // Delete old OG image if exists
            if ($ogImagePath && file_exists(public_path($ogImagePath))) {
                unlink(public_path($ogImagePath));
            }
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Update project
        $project->update($data);

        // Prepare SEO data - only include relevant fields
        $seoData = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'og_image' => $data['og_image'] ?? $ogImagePath,
        ];

        // Update or create SEO record
        if ($project->seo) {
            $project->seo()->update($seoData);
        } else {
            $project->seo()->create($seoData);
        }

        // Handle default image selection
        if ($request->filled('is_default')) {
            Media::where('parent_id', $project->id)
                ->where('parent_type', Project::class)
                ->update(['is_default' => false]);
                
            // Set the selected media as default
            if (str_starts_with($request->is_default, 'new_')) {
                $newDefaultFlag = true;
            } else {
                Media::where('id', $request->is_default)
                    ->where('parent_id', $project->id)
                    ->where('parent_type', Project::class)
                    ->update(['is_default' => true]);
            }
        }

        // Handle Media deletion
        if ($request->filled('delete_media')) {
            foreach ($request->delete_media as $mediaId) {
                $media = Media::find($mediaId);
                if ($media && $media->parent_id == $project->id && $media->parent_type == Project::class) {
                    ImageHelper::deleteImage($media->file_path);
                    $media->delete();
                }
            }
        }

        // Handle Media uploads
        if ($request->hasFile('media')) {
            $hasDefault = Media::where('parent_id', $project->id)
                ->where('parent_type', Project::class)
                ->where('is_default', true)
                ->exists();

            foreach ($request->file('media') as $key => $file) {
                $isDefault = (!$hasDefault && $key === 0) || (isset($newDefaultFlag) && $newDefaultFlag);
                
                $media = Media::create([
                    'parent_type' => Project::class,
                    'parent_id' => $project->id,
                    'file_path' => ImageHelper::uploadImage($file, 'uploads/projects'),
                    'caption' => null,
                    'is_default' => $isDefault,
                ]);
                
                if ($isDefault) {
                    $hasDefault = true;
                    $newDefaultFlag = false;
                }
            }
        }
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::with(['media'])->findOrFail($id);

        // Delete SEO OG image
        if ($og = $project->seo?->og_image) {
            ImageHelper::deleteImage($og);
            $project->seo()->delete();
        }

        // Delete media files
        foreach ($project->media as $media) {
            ImageHelper::deleteImage($media->file_path);
            $media->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }


    public function deleteImage(Request $request)
    {
        // validate incoming request
        $request->validate([
            'id' => 'required|exists:media,id',
        ]);

        $media = Media::findOrFail($request->id);

        // delete file from public/uploads (or wherever you store it)
        if ($media->file_path && file_exists(public_path($media->file_path))) {
            unlink(public_path($media->file_path));
        }

        // delete DB record
        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully',
        ]);
    }
}