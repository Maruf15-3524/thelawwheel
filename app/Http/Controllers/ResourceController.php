<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ResourceCategory;

class ResourceController extends Controller
{

    public function index()
    {
        $resources= Resource::orderBy('created_at', 'asc')->get();
        return view('backend.resource.index',compact('resources'));
    }

    public function create()
    {
        $categories=ResourceCategory::all();
        return view('backend.resource.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $resource = new Resource();
    
    // Get the category, title, and description
    $resource->resource_category_id = $request->category;  // Assuming 'category' is the resource category name
    $resource->title = $request->title;
    $resource->description = $request->description;


    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $newFileName =  str_replace(' ', '_', $resource->title) . '.' . $extension;
        $file->move(public_path('resource/img/'), $newFileName);
        $resource->url_or_img = $newFileName;
    }

    if ($request->hasFile('pdf')) {
        $file = $request->file('pdf');
        $extension = $file->getClientOriginalExtension();
        $pdfName = str_replace(' ', '_', $resource->title) . '.' . $extension;
        
        $file->move(public_path('resource/pdf'), $pdfName);

        $resource->link =$pdfName;
    }
    

    if ($request->has('video_url') && $request->video_url) {
        $resource->url_or_img = $request->video_url;
    }


    $resource->save();


    return redirect()->route('resources.index')->with('success', 'Resource saved successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
