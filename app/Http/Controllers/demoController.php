<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Demo;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function store(Request $request){
        
        $validatedRequest = $request->validate([
            'first_name' => 'required|string|max:225',
            'last_name' => 'nullable|string|max:225',
            'phone_number' => 'required|unique:customers,phone_number',
            'email' => 'required|email|unique:customers,email',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
        ]);
        
        $customer = Customer::create($validatedRequest);

        Demo::create([
            'customer_id' => $customer->id,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
        ]);

        return back()->with('success', 'Demo booked successfully!');
    }

}
