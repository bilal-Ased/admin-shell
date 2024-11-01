<?php

namespace App\Http\Controllers;

use App\DataTables\MyTicketsDataTable;
use App\DataTables\TicketsDataTable;
use App\Models\Customer;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'status_id' => 'required',
            'file_path' => 'nullable',
            'comments' => 'nullable',
        ]);

        $request['created_by'] = Auth::id();
        Tickets::create($request->all());



        return redirect()->route('tickets.list')->with('success', 'Ticket Created successfully!');
    }

    public function list(TicketsDataTable $dataTable)
    {
        return $dataTable->render('tickets.all-tickets');
    }
    public function getAuthUsersTickets(MyTicketsDataTable $dataTable)
    {
        return $dataTable->render('tickets.my-tickets');
    }


    public function update(Request $request, $ticketId)
    {
        $ticket = Tickets::with(['user', 'status'])->findOrFail($ticketId);
        // $ticket->assigned_to = 3;
        // $ticket->save();

        return view('tickets.update', ['ticket' => $ticket]);
    }
}
