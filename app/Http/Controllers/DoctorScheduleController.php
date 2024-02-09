<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use App\Models\User;
use Illuminate\Http\Client\Request;

class DoctorScheduleController extends Controller
{
    public function index()
    {
        $doctors = User::where('role', 'doctor')->get();

        return view('Doctor-shedule.index', compact('doctors'));

    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'doctor_id' => 'required|exists:users,id,role,doctor',
            'day_of_week' => 'required|integer|min:0|max:6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            // Add other validation rules as needed
        ]);

        // Store the new schedule
        DoctorSchedule::create($request->all());

        return redirect()->route('Doctor-shedule.index')->with('success', 'Schedule created successfully');
    }
}
