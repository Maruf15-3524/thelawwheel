<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\TeamMember;
use Illuminate\Support\Str;  

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view('backend.user.index', compact('users'));
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
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'mobile' => 'nullable|string|max:15',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->mobile = $request->mobile;

    $user->save();
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        $newFileName = $user->id . '_' . str_replace(' ', '_', $user->name) . '.' . $extension;
        $file->move(public_path('img/user/'), $newFileName);
        $user->img = $newFileName;

        $user->save();
    }

    return redirect()->back()->with('message', 'User created successfully');
}



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->mobile = $request->mobile;
    
        if ($request->hasFile('img')) {
            if ($user->img) {
                $oldImagePath = public_path('img/user/' . $user->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $newFileName = $user->id . '_' . str_replace(' ', '_', $user->name) . '.' . $extension;
            $file->move(public_path('img/user'), $newFileName);
            $user->img = $newFileName;
        }
    
        $user->update();

        return redirect()->back()->with('message', 'User updated successfully');
    }
    



    

    public function destroy($id)
    {
   
        $user = User::findOrFail($id);

        $imagePath = public_path('img/user/' . $user->img);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }

    public function about()
    {
       return View('frontend.about-us');
    }
    public function team()
    {

        // $teamMembers = TeamMember::all();
        // return view('frontend.team', compact('teamMembers'));

        $teamMembers = TeamMember::orderBy('order', 'asc')->get()->groupBy('role');

        return view('frontend.team', compact('teamMembers'));

    //    return View('frontend.team');
    }

    public function show_team_datails($id, $slug) {
        // Fetch the team member by ID
        $member = TeamMember::findOrFail($id);
        
        // You can also use the $slug if needed for further validation or other logic
        // For example, ensure the slug matches the member's full_name
        if (Str::slug($member->full_name) !== $slug) {
            abort(404); 
        }
        
        // Return the view with the member data
        return view('frontend.teammember_details', compact('member'));
    }
    public function book()
    {
       return View('frontend.book');
    }
    public function research()
    {
       return View('frontend.research');
    }
    public function video()
    {
       return View('frontend.video');
    }




    
}
