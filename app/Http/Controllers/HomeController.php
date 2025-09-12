<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactSubmission;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Contact;
use App\Models\Story;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;
use App\Models\Project;
use App\Models\Achievement;
use App\Models\BlogPost;
use App\Models\BlogComment;

class HomeController extends Controller
{
    public function welcome()
    {
        $story = Story::where('status', true)->first();
        $testimonials = Testimonial::where('status', true)->latest()->get();
        $clients = Client::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        $teams = Team::where('status', true)->orderBy('order')->get();
        $achievements = Achievement::where('status', 'active')->orderBy('sort_order')->get();
        $projects = Project::with('media')->latest()->take(8)->get();
        $blogPosts = BlogPost::with('author')->where('status', 'published')->where('published_date', '<=', now())->orderBy('published_date', 'desc')->take(3)->get();

        return view('frontEnd.welcome', compact('story', 'services', 'achievements', 'testimonials', 'teams', 'clients', 'projects', 'blogPosts'));
    }
    /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function about()
    {
        $story = Story::where('status', true)->first();
        $testimonials = Testimonial::where('status', true)->latest()->get();
        $clients = Client::active()->ordered()->get();
        $teams = Team::where('status', true)->orderBy('order')->get();
        $achievements = Achievement::where('status', 'active')->orderBy('sort_order')->get();

        return view('frontEnd.pages.about-us', compact('story', 'achievements', 'testimonials', 'teams', 'clients'));
    }
    public function personalInfo()
    {
        return view('frontEnd.pages.personal-info');
    }

     /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function contact()
    {
        $contactInfo = Contact::first();
        $clients = Client::active()->ordered()->get();
        return view('frontEnd.pages.contact-us', compact('contactInfo', 'clients'));
    }

    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ContactSubmission::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

     /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function services()
    {
        $services = Service::active()->ordered()->get();
        $achievements = Achievement::where('status', 'active')->orderBy('sort_order')->get();
        return view('frontEnd.pages.services', compact('services', 'achievements'));
    }
    public function servicesDetails($slug)
    {
        // Load service with all needed relations
        $service = Service::with(['media', 'attachments', 'features', 'seo'])
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        // Optional: Load all services for sidebar list
        $allServices = Service::active()->ordered()->get();

        return view('frontEnd.pages.services-details', compact('service', 'allServices'));
    }
     /**________________________________________________________________________________________
     * Project Menu Pages
     * ________________________________________________________________________________________
     */
    public function projects()
    {
        $projects = Project::with('category')->latest()->paginate(9);
        return view('frontEnd.pages.projects', compact('projects'));
    }
    public function projectsDetails($slug)
    {
        $project = Project::with('category')->where('slug', $slug)->firstOrFail();
        return view('frontEnd.pages.projects-details', compact('project'));
    }
     /**________________________________________________________________________________________
     * Blog Menu Pages
     * ________________________________________________________________________________________
     */
    public function blogs()
    {
        $blogPosts = BlogPost::with(['author', 'category', 'tags'])
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('frontEnd.pages.blogs', compact('blogPosts', 'categories', 'allTags', 'recentPosts'));
    }

    // Blog details page
    public function blogsDetails($slug)
    {
        $post = BlogPost::with(['author', 'category', 'tags', 'comments.replies'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->firstOrFail();

        $categories = Category::withCount('blogPosts')->get();
        $recentPosts = BlogPost::latest()->take(5)->get();
        $allTags = Tag::all();

        return view('frontEnd.pages.blogs-details', compact('post', 'categories', 'recentPosts', 'allTags'));
    }

    // Blogs by tag
    public function blogsTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $blogPosts = $tag->blogPosts()
            ->with(['author', 'category', 'tags'])
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('frontEnd.pages.blogs', compact('blogPosts', 'tag', 'categories', 'allTags', 'recentPosts'));
    }

    // Blogs by category
    public function blogsCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $blogPosts = BlogPost::where('category_id', $category->id)
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->with(['author', 'tags'])
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('frontEnd.pages.blogs', compact('blogPosts', 'category', 'categories', 'allTags', 'recentPosts'));
    }

    // Blogs by search
    public function blogsSearch(Request $request)
    {
        $query = $request->input('query');

        $blogPosts = BlogPost::where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->with(['author', 'category', 'tags'])
            ->orderBy('published_date', 'desc')
            ->paginate(8);

        $categories = Category::withCount('blogPosts')->get();
        $allTags = Tag::all();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('frontEnd.pages.blogs', compact('blogPosts', 'query', 'categories', 'allTags', 'recentPosts'));
    }

    // Store comment
    public function blogsCommentsStore(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:blog_comments,id',
        ]);

        $blog->comments()->create([
            'parent_id' => $validated['parent_id'] ?? null,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content'],
        ]);



        return back()->with('success', 'Comment submitted successfully!');
    }
    
}
