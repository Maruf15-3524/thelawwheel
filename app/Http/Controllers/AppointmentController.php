<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'mobile' => 'required|regex:/^[0-9\s\+]+$/',
            'email' => 'nullable|email',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'case_type' => 'required|integer',
        ]);

        // Store data into the database
        Appointment::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'case_type' => $request->case_type,
        ]);

        // Redirect with a success message
        return redirect()->route('index')->with('success', 'Appointment booked successfully!');
    }

    


    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
