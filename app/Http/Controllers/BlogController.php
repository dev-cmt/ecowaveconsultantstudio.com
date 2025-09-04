<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImageHelper;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::with(['category', 'author'])
                        ->latest()
                        ->paginate(10);
        
        return view('backEnd.admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backEnd.admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:published,scheduled,draft',
            'published_date' => 'nullable|date|required_if:status,scheduled|required_if:status,published'
        ]);

        // Generate slug from title
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        
        // Ensure slug is unique
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $postData = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'status' => $request->status,
            'published_date' => $request->published_date ?? now(),
        ];

        // Handle image upload using ImageHelper
        if ($request->hasFile('image')) {
            $imagePath = ImageHelper::uploadImage($request->file('image'), 'uploads/blog-images');
            $postData['image_path'] = $imagePath;
        }

        BlogPost::create($postData);

        $notification = [
            'messege' => 'Blog post created successfully!',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('admin.blogs.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blog)
    {
        $categories = Category::all();
        return view('backEnd.admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:published,scheduled,draft',
            'published_date' => 'nullable|date|required_if:status,scheduled|required_if:status,published'
        ]);

        $updateData = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'published_date' => $request->published_date,
        ];

        // Handle image upload using ImageHelper
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image_path) {
                ImageHelper::deleteImage($blog->image_path);
            }
            
            $imagePath = ImageHelper::uploadImage($request->file('image'), 'uploads/blog-images');
            $updateData['image_path'] = $imagePath;
        }

        // Handle image removal if checkbox is checked
        if ($request->has('remove_image')) {
            if ($blog->image_path) {
                ImageHelper::deleteImage($blog->image_path);
            }
            $updateData['image_path'] = null;
        }

        // Update slug if title changed
        if ($blog->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            
            while (BlogPost::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            
            $updateData['slug'] = $slug;
        }

        $blog->update($updateData);

        $notification = [
            'messege' => 'Blog post updated successfully!',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('admin.blogs.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blog)
    {
        // Delete associated image using ImageHelper
        if ($blog->image_path) {
            ImageHelper::deleteImage($blog->image_path);
        }
        
        $blog->delete();

        $notification = [
            'messege' => 'Blog post deleted successfully!',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('admin.blogs.index')->with($notification);
    }
}