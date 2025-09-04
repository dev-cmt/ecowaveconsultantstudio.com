<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactSubmission;
use App\Models\Testimonial;
use App\Models\Property;
use App\Models\Contact;
use App\Models\Story;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;
use App\Models\Project;
use App\Models\Achievement;
use App\Models\BlogPost;

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
        return view('frontEnd.pages.services');
    }
    public function servicesDetails()
    {
        return view('frontEnd.pages.services-details');
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
        $blogPosts = BlogPost::with(['author'])
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->orderBy('published_date', 'desc')
            ->paginate(8); 

        return view('frontEnd.pages.blogs', compact('blogPosts'));
    }
    public function blogsDetails($slug)
    {
        $post = BlogPost::with(['author', 'category'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where('published_date', '<=', now())
            ->firstOrFail();

        return view('frontEnd.pages.blogs-details', compact('post'));
    }
    
}
