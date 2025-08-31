<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactSubmission;
use App\Models\Testimonial;
use App\Models\Property;
use App\Models\Contact;

class HomeController extends Controller
{
    public function welcome()
    {
        $rentProperties = Property::with('category', 'images')->where('status', 'active')->latest()->take(6)->get(); // ->where('property_status', 'For Rent')
        $saleProperties = Property::with('category', 'images')->where('status', 'active')->latest()->take(4)->get(); // ->where('property_status', 'For Sale')
        $testimonials = Testimonial::where('status', 'active')->latest()->take(10)->get();

        return view('frontEnd.welcome', compact('testimonials', 'rentProperties', 'saleProperties'));
    }
    /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function about()
    {
        return view('frontEnd.pages.about-us');
    }
    /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function properties(Request $request)
    {
        $query = Property::with('images')
            ->where('status', 'active');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('state_county', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
            });
        }

        // Sorting
        switch ($request->sort) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'popular':
                $query->orderBy('view_count', 'desc');
                break;
            default:
                $query->orderBy('is_featured', 'desc')
                      ->orderBy('created_at', 'desc');
                break;
        }

        // Use paginate() instead of get()
        $properties = $query->paginate(10);
        return view('frontEnd.pages.properties', compact('properties'));
    }

    public function propertyDetails($slug)
    {
        $property = Property::with('images')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Increment view count
        $property->increment('view_count');

        return view('frontEnd.pages.property-details', compact('property'));
    }

     /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function contact()
    {
        $contactInfo = Contact::first();
        return view('frontEnd.pages.contact-us', compact('contactInfo'));
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
    public function appoinmentFrom()
    {
        return view('frontEnd.pages.appoinment-from');
    }
}
