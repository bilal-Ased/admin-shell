<?php

namespace App\Http\Controllers;

use App\Models\DoctorShedule;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorsSheduleController extends Controller
{

    public function index()
    {
        return view('settings.shedule-managment');
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'day' => 'nullable|string',
            'exception_date' => 'nullable|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_available' => 'required|boolean'
        ]);

        DoctorShedule::create($request->only([
            'user_id',
            'day',
            'exception_date',
            'start_time',
            'end_time',
            'is_available'
        ]));

        return redirect()->back()->with('success', 'Schedule updated successfully.');
    }

    public function getAvailableSlots(Request $request)
    {
        $userId = $request->input('user_id');
        $date = $request->input('date');

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $slots = $user->getAvailableSlotsForDate($date);

        return response()->json($slots);
    }
}
