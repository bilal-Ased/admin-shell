<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
}
