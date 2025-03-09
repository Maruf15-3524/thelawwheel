<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all(); // Fetch all team members from the database
        return view('backend.teammember.index', compact('teamMembers'));
    }
    public function create()
    {
        return view('backend.teammember.create');
    }

    public function store(Request $request)
    {
        // Validation
        // $request->validate([
        //     'full_name'   => 'required|string|max:255',
        //     'degree'      => 'required|string|max:255',
        //     'designation' => 'required|string|max:255',
        //     'role'        => 'required|string|max:255',
        //     'order'       => 'required|integer',
        //     'description' => 'nullable|string',
        //     'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
        // ]);

        // Handle file upload for profile picture
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('teammember');
            $image->move($destinationPath, $imageName);

            $imagePath = 'teammember/' . $imageName;
        } else {
            $imagePath = null;
        }

        // Create new team member record in the database
        TeamMember::create([
            'full_name'   => $request->full_name,
            'degree'      => $request->degree,
            'designation' => $request->designation,
            'role'        => $request->role,
            'order'       => $request->order,
            'description' => $request->description,
            'profile_pic' => $imagePath, // Store image path in the database
        ]);

        // Redirect to the desired page after successful submission
        return redirect()->route('teammembers.index')->with('message', 'Team member created successfully!');
    }

    public function edit($id)
    {
        $teammember = TeamMember::findOrFail($id);
        return view('backend.teammember.edit', compact('teammember'));
    }

    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        // Validate request
        // $request->validate([
        //     'full_name' => 'required|string|max:255',
        //     'degree' => 'required|string|max:255',
        //     'designation' => 'required|string|max:255',
        //     'role' => 'required|string',
        //     'order' => 'required|integer',
        //     'description' => 'nullable|string',
        //     'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        // ]);

        // Image Upload Logic
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('teamember');
            $image->move($destinationPath, $imageName);
            $teamMember->profile_pic = 'teamember/' . $imageName;
        }

        // Update Other Fields
        $teamMember->full_name = $request->full_name;
        $teamMember->degree = $request->degree;
        $teamMember->designation = $request->designation;
        $teamMember->role = $request->role;
        $teamMember->order = $request->order;
        $teamMember->description = $request->description;
        $teamMember->save();

        return redirect()->route('teammembers.index')->with('message', 'Team Member updated successfully!');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();
        return redirect()->route('teammembers.index')->with('message', 'Team Member deleted successfully!');
    }
}
