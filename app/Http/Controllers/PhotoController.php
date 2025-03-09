<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos=Photo::orderBy('created_at', 'asc')->get();
        return view('backend.photo.index',compact('photos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('img')) {
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(base_path('store/photo/photos'), $imageName);
    }

    $galleryImages = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $galleryImageName = time() . '_' . $image->getClientOriginalName();
            $image->move(base_path('store/photo/gallery'), $galleryImageName);
            $galleryImages[] = $galleryImageName;
        }
    }


    $photo = new Photo();
    $photo->title = $request->title;
    $photo->img = $imageName;
    $photo->images = !empty($galleryImages) ? json_encode($galleryImages) : null; // Store multiple images as JSON
    $photo->save();

    return redirect()->back()->with('success', 'Photo uploaded successfully!');
}


    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $photo = Photo::findOrFail($id);

    if ($request->hasFile('img')) {
        if ($photo->img && file_exists(base_path('store/photo/photos/' . $photo->img))) {
            unlink(base_path('store/photo/photos/' . $photo->img));
        }

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(base_path('store/photo/photos'), $imageName);
        $photo->img = $imageName;
    }

    $galleryImages = $photo->images ? json_decode($photo->images, true) : [];

    if ($request->hasFile('images')) {
        foreach ($galleryImages as $oldImage) {
            if (file_exists(base_path('store/photo/gallery/' . $oldImage))) {
                unlink(base_path('store/photo/gallery/' . $oldImage));
            }
        }

        $galleryImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $galleryImageName = time() . '_' . $image->getClientOriginalName();
                $image->move(base_path('store/photo/gallery'), $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
        }

    }

    $photo->title = $request->title;
    $photo->images = !empty($galleryImages) ? json_encode($galleryImages) : null;
    $photo->save();

    return redirect()->back()->with('success', 'Photo updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
    
        $mainImagePath = base_path('store/photo/photos/' . $photo->img);
        

        if (file_exists($mainImagePath)) {
            unlink($mainImagePath);
            
        } else {
            
        }

        $galleryImages = json_decode($photo->images, true);
        if (!empty($galleryImages) && is_array($galleryImages)) {
            foreach ($galleryImages as $image) {
                $galleryImagePath = base_path('store/photo/gallery/' . $image);
                if (file_exists($galleryImagePath)) {
                    unlink($galleryImagePath);
                    
                } else {
                    
                }
            }
        }
    
        $photo->delete();
    
        return redirect()->back()->with('message', 'Photo deleted successfully');
    }
    
}
