<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();
        $callId = $request->query('call_id'); // Extract call_id if needed

        $customer = null;
        // Optionally filter by call_id if provided
        if ($callId) {
            $query->where('phone_number', 'like', '%' . $callId . '%');
            $customer = $query->first();
        }
        return view('tickets.create', compact('customer'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'issue_source_id' => 'required',
            'issue_category_id' => 'required',
            'disposition_id' => 'required',
            'department_id' => 'nullable',
            'assigned_to' => 'required',
            'assigned_to' => 'required',
            'status_id' => 'required',
            'file_path' => 'nullable',
            'comments' => 'nullable',
        ]);

        Tickets::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket Created successfully!');
    }
}
