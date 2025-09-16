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
        $posts = BlogPost::with(['category', 'author'])->latest()->paginate(10);
        return view('backEnd.admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('backEnd.admin.blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'title'          => 'required|string|max:255',
            'content'        => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'         => 'required|in:published,scheduled,draft',
            'published_date' => 'nullable|date|required_if:status,scheduled|required_if:status,published',
            'meta_title'     => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'meta_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // ✅ Generate unique slug
        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $count = 1;
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug']         = $slug;
        $data['author_id']    = Auth::id();
        $data['published_date'] = $data['published_date'] ?? now();

        // ✅ Upload main blog image
        if ($request->hasFile('image')) {
            $data['image_path'] = ImageHelper::uploadImage($request->file('image'), 'uploads/blog-images');
        }

        // ✅ Upload SEO OG image
        if ($request->hasFile('meta_image')) {
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        }

        // Create Blog post
        $blogPost = BlogPost::create($data);

        // ✅ Create SEO record
        $blogPost->seo()->create([
            'meta_title'       => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords'    => $data['meta_keywords'] ?? null,
            'og_image'         => $data['og_image'] ?? null,
        ]);

        // ✅ Attach tags
        if (!empty($data['tags'])) {
            $blogPost->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.blogs.index')
            ->with(['messege' => 'Blog post created successfully!', 'alert-type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blog)
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('backEnd.admin.blog.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'title'          => 'required|string|max:255',
            'content'        => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'         => 'required|in:published,scheduled,draft',
            'published_date' => 'nullable|date|required_if:status,scheduled|required_if:status,published',
            'meta_title'     => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'meta_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        $data['published_date'] = $data['published_date'] ?? $blog->published_date;

        // ✅ Update slug if title changed
        if ($blog->title !== $data['title']) {
            $slug = Str::slug($data['title']);
            $originalSlug = $slug;
            $count = 1;
            while (BlogPost::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $data['slug'] = $slug;
        }

        // ✅ Replace blog main image if new one uploaded
        if ($request->hasFile('image')) {
            if ($blog->image_path) {
                ImageHelper::deleteImage($blog->image_path);
            }
            $data['image_path'] = ImageHelper::uploadImage($request->file('image'), 'uploads/blog-images');
        }

        // ✅ Remove image if user checked remove_image
        if ($request->has('remove_image')) {
            if ($blog->image_path) {
                ImageHelper::deleteImage($blog->image_path);
            }
            $data['image_path'] = null;
        }

        // ✅ Handle OG image for SEO
        $currentOgImage = $blog->seo->og_image ?? null;
        if ($request->hasFile('meta_image')) {
            if ($currentOgImage && file_exists(public_path($currentOgImage))) {
                unlink(public_path($currentOgImage));
            }
            $data['og_image'] = ImageHelper::uploadImage($request->file('meta_image'), 'uploads/seo');
        } else {
            $data['og_image'] = $currentOgImage;
        }

        // ✅ Update blog
        $blog->update($data);

        // ✅ Update or create SEO record
        $seoData = [
            'meta_title'       => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords'    => $data['meta_keywords'] ?? null,
            'og_image'         => $data['og_image'] ?? null,
        ];
        $blog->seo ? $blog->seo()->update($seoData) : $blog->seo()->create($seoData);

        // ✅ Sync tags
        $blog->tags()->sync($data['tags'] ?? []);

        return redirect()->route('admin.blogs.index')->with(['messege' => 'Blog post updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blog)
    {
        if ($blog->image_path) {
            ImageHelper::deleteImage($blog->image_path);
        }

        $blog->tags()->detach();

        // delete seo og image if exists
        if ($blog->seo && $blog->seo->og_image && file_exists(public_path($blog->seo->og_image))) {
            unlink(public_path($blog->seo->og_image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with(['messege' => 'Blog post deleted successfully!', 'alert-type' => 'success']);
    }
}
