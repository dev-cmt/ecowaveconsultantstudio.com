<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use App\Models\Feature;
use App\Models\PropertyImage;
use App\Models\PropertyAttachment;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('category', 'images')->latest()->paginate(10);
        return view('backEnd.admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $features = Feature::where('status', 'active')->get();
        return view('backEnd.admin.properties.create', compact('categories', 'features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state_county' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'attachments.*' => 'file|mimes:pdf,doc,docx|max:5120'
        ]);

        $propertyData = $request->all();
        $propertyData['is_featured'] = $request->has('is_featured');

        $property = Property::create($propertyData);

        if ($request->has('features')) {
            $property->features()->sync($request->features);
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $hasDefault = PropertyImage::where('property_id', $property->id)->where('is_default', true)->exists();

            foreach ($request->file('images') as $key => $img) {
                if ($path = ImageHelper::uploadImage($img, 'uploads/properties')) {
                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image_path' => $path,
                        'is_default' => !$hasDefault && $key === 0,
                    ]);
                }
            }
        }

        // Handle new attachments upload
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $key => $attachment) {
                // Upload the file using your helper
                $filePath = ImageHelper::uploadImage($attachment, 'uploads/properties/attachments');

                if ($filePath) {
                    PropertyAttachment::create([
                        'property_id' => $property->id,
                        'name' => $request->input('attachment_name')[$key] ?? $attachment->getClientOriginalName(),
                        'file_path' => $filePath,
                    ]);
                }
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        $property->load('category', 'features', 'images', 'attachments');
        return view('backEnd.admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $categories = Category::where('status', 'active')->get();
        $features = Feature::where('status', 'active')->get();
        $property->load('features');
        return view('backEnd.admin.properties.edit', compact('property', 'categories', 'features'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state_county' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'attachments.*' => 'file|mimes:pdf,doc,docx|max:5120'
        ]);

        $propertyData = $request->except(['images', 'attachments', 'features', 'is_default']);
        $propertyData['is_featured'] = $request->has('is_featured');

        $property->update($propertyData);
        $property->features()->sync($request->features ?? []);

        // Handle default image
        if ($request->has('is_default')) {
            PropertyImage::where('property_id', $property->id)->update(['is_default' => false]); // Set all value => 0
            PropertyImage::where('id', $request->is_default)->update(['is_default' => true]); // Select only value => 1
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $hasDefault = PropertyImage::where('property_id', $property->id)->where('is_default', true)->exists();

            foreach ($request->file('images') as $key => $img) {
                if ($path = ImageHelper::uploadImage($img, 'uploads/properties')) {
                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image_path' => $path,
                        'is_default' => !$hasDefault && $key === 0,
                    ]);
                }
            }
        }

        // Handle attachments deletion
        if ($request->has('delete_attachments')) {
            $attachmentsToDelete = PropertyAttachment::whereIn('id', $request->delete_attachments)->get();
            foreach ($attachmentsToDelete as $attachment) {
                if (File::exists(public_path($attachment->file_path))) {
                    File::delete(public_path($attachment->file_path));
                }
                $attachment->delete();
            }
        }

        // Handle new attachments upload
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $key => $attachment) {
                // Upload the file using your helper
                $filePath = ImageHelper::uploadImage($attachment, 'uploads/properties/attachments');

                if ($filePath) {
                    PropertyAttachment::create([
                        'property_id' => $property->id,
                        'name' => $request->input('attachment_name')[$key] ?? $attachment->getClientOriginalName(),
                        'file_path' => $filePath,
                    ]);
                }
            }
        }


        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        foreach ($property->images as $image) {
            $this->deleteFile($image->image_path);
            $image->delete();
        }

        foreach ($property->attachments as $attachment) {
            $this->deleteFile($attachment->file_path);
            $attachment->delete();
        }

        $property->features()->detach();
        $property->delete();

        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }

    public function deleteImage(PropertyImage $image)
    {
        if ($this->deleteFile($image->image_path)) {
            $image->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to delete image']);
    }

    public function deleteAttachment(PropertyAttachment $attachment)
    {
        if ($this->deleteFile($attachment->file_path)) {
            $attachment->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to delete attachment']);
    }

    private function deleteFile($filePath)
    {
        $fullPath = public_path($filePath);
        if (file_exists($fullPath) && is_file($fullPath)) {
            unlink($fullPath);
            return true;
        }
        return false;
    }
}
