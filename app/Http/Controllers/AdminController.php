<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use App\Models\HomeSlider;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function view_slider(){
        return view('admin.slider');
    }

        // Get all sliders (AJAX)
        public function getSliders()
        {
            $sliders = HomeSlider::orderBy('display_order')->get();
            return response()->json($sliders);
        }
    
        public function getSingleSlider($id)
        {
            $sliders = HomeSlider::findOrFail($id);
            return response()->json($sliders);
        }
    
        // Store new slider
        public function storeSlider(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image_url' => 'nullable|url',
                'link' => 'nullable|url',
                'display_order' => 'required|integer',
                'status' => 'required|in:active,inactive'
            ]);
    
            $data = $request->only(['title', 'subtitle', 'link', 'display_order', 'status']);
    
            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('sliders', 'public');
                $data['image_path'] = $imagePath;
                $data['image_url'] = null;
            } elseif ($request->filled('image_url')) {
                $data['image_url'] = $request->image_url;
                $data['image_path'] = null;
            } else {
                return response()->json(['error' => 'Either image or image URL is required'], 422);
            }
    
            $slider = HomeSlider::create($data);
    
            return response()->json([
                'success' => true,
                'slider' => $slider
            ]);
        }
    
        // Update slider
        public function updateSlider(Request $request, $id)
        {
            $slider = HomeSlider::findOrFail($id);
    
            $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image_url' => 'nullable|url',
                'link' => 'nullable|url',
                'display_order' => 'required|integer',
                'status' => 'required|in:active,inactive'
            ]);
    
            $data = $request->only(['title', 'subtitle', 'link', 'display_order', 'status']);
    
            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($slider->image_path) {
                    Storage::disk('public')->delete($slider->image_path);
                }
                
                $imagePath = $request->file('image')->store('sliders', 'public');
                $data['image_path'] = $imagePath;
                $data['image_url'] = null;
            } elseif ($request->filled('image_url')) {
                // Delete old image if exists
                if ($slider->image_path) {
                    Storage::disk('public')->delete($slider->image_path);
                }
                
                $data['image_url'] = $request->image_url;
                $data['image_path'] = null;
            }
    
            $slider->update($data);
    
            return response()->json([
                'success' => true,
                'slider' => $slider
            ]);
        }
    
        // Delete slider
        public function deleteSlider($id)
        {
            $slider = HomeSlider::findOrFail($id);
            
            // Delete image file if exists
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
            
            $slider->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Slider deleted successfully'
            ]);
        }
    
    public function view_publication(){
        return view('admin.publication');
    }

    public function getPublications(Request $request)
    {
        $category = $request->get('category', 'all');
        
        $publications = Publication::byCategory($category)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($publication) {
                return [
                    'id' => $publication->id,
                    'title' => $publication->title,
                    'category' => $publication->category,
                    'category_label' => $publication->category_label,
                    'author' => $publication->author,
                    'description' => $publication->description,
                    'link' => $publication->link,
                    'file_path' => $publication->file_path,
                    'thumbnail_path' => $publication->thumbnail_path,
                    'file_url' => $publication->file_url,
                    'thumbnail_url' => $publication->thumbnail_url,
                    'publication_date' => $publication->publication_date,
                    'formatted_date' => $publication->formatted_date,
                    'download_count' => $publication->download_count,
                    'featured' => $publication->featured,
                    'status' => $publication->status,
                    'created_at' => $publication->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $publication->updated_at->format('Y-m-d H:i:s')
                ];
            });

        return response()->json($publications);
    }

    // Store new publication
    public function storePublication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|in:tract,audio,devotional',
            'author' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB max
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_date' => 'nullable|date',
            'featured' => 'nullable|boolean',
            'status' => 'required|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'title', 'category', 'author', 'description', 
            'link', 'publication_date', 'featured', 'status'
        ]);

        // Handle file upload (for tracts and devotionals)
        if ($request->category !== 'audio' && $request->hasFile('file')) {
            $filePath = $request->file('file')->store('publications/files', 'public');
            $data['file_path'] = $filePath;
        } elseif ($request->category === 'audio' && $request->filled('link')) {
            // Audio only needs link
            $data['link'] = $request->link;
        } elseif ($request->category !== 'audio' && $request->filled('link')) {
            // For tracts/devotionals, either file or link is acceptable
            $data['link'] = $request->link;
        } elseif ($request->category !== 'audio') {
            return response()->json(['error' => 'For tracts and devotionals, either file or link is required'], 422);
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('publications/thumbnails', 'public');
            $data['thumbnail_path'] = $thumbnailPath;
        }

        $publication = Publication::create($data);

        return response()->json([
            'success' => true,
            'publication' => $publication,
            'message' => 'Publication added successfully'
        ]);
    }

    // Update publication
    public function updatePublication(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|in:tract,audio,devotional',
            'author' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_date' => 'nullable|date',
            'featured' => 'nullable|boolean',
            'status' => 'required|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'title', 'category', 'author', 'description', 
            'link', 'publication_date', 'featured', 'status'
        ]);

        // Handle file update
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($publication->file_path) {
                Storage::disk('public')->delete($publication->file_path);
            }
            
            $filePath = $request->file('file')->store('publications/files', 'public');
            $data['file_path'] = $filePath;
        } elseif ($request->category !== 'audio' && $request->filled('link')) {
            // If updating to link from file, delete old file
            if ($publication->file_path) {
                Storage::disk('public')->delete($publication->file_path);
                $data['file_path'] = null;
            }
            $data['link'] = $request->link;
        } elseif ($request->category !== 'audio' && !$request->hasFile('file') && !$request->filled('link') && !$publication->file_path) {
            return response()->json(['error' => 'For tracts and devotionals, either file or link is required'], 422);
        }

        // Handle thumbnail update
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($publication->thumbnail_path) {
                Storage::disk('public')->delete($publication->thumbnail_path);
            }
            
            $thumbnailPath = $request->file('thumbnail')->store('publications/thumbnails', 'public');
            $data['thumbnail_path'] = $thumbnailPath;
        } elseif ($request->has('remove_thumbnail')) {
            // Remove thumbnail if requested
            if ($publication->thumbnail_path) {
                Storage::disk('public')->delete($publication->thumbnail_path);
            }
            $data['thumbnail_path'] = null;
        }

        $publication->update($data);

        return response()->json([
            'success' => true,
            'publication' => $publication,
            'message' => 'Publication updated successfully'
        ]);
    }

    // Delete publication
    public function deletePublication($id)
    {
        $publication = Publication::findOrFail($id);
        
        // Delete files if they exist
        if ($publication->file_path) {
            Storage::disk('public')->delete($publication->file_path);
        }
        
        if ($publication->thumbnail_path) {
            Storage::disk('public')->delete($publication->thumbnail_path);
        }
        
        $publication->delete();

        return response()->json([
            'success' => true,
            'message' => 'Publication deleted successfully'
        ]);
    }

    // Toggle publication status
    public function togglePublicationStatus($id)
    {
        $publication = Publication::findOrFail($id);
        
        $publication->status = $publication->status === 'active' ? 'inactive' : 'active';
        $publication->save();

        return response()->json([
            'success' => true,
            'new_status' => $publication->status,
            'message' => 'Status updated successfully'
        ]);
    }

    // Toggle featured status
    public function toggleFeatured($id)
    {
        $publication = Publication::findOrFail($id);
        
        $publication->featured = !$publication->featured;
        $publication->save();

        return response()->json([
            'success' => true,
            'featured' => $publication->featured,
            'message' => 'Featured status updated'
        ]);
    }
    public function getPublicationDetail($id)
    {
        $publication = Publication::findOrFail($id);
        
        return response()->json(
             $publication
        );
    }
    
    public function view_messages(){
        $messages = ContactEnquiry::all();
        return view('admin.message', compact('messages'));
    }
}
