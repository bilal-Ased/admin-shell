<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('customers.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:customers,phone_number',
            'alternate_number' => 'nullable',
            'email' => 'nullable|email|unique:customers,email',
        ], [
            'phone_number.unique' => 'The phone number has already been taken.',
            'email.unique' => 'The email has already been taken.',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    public function editCustomer($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        return view('customers.edit-modal', ['customer' => $customer]);
    }


    public function searchCustomers(Request $request)
    {
        $searchReq = $request->get('searchReq');
        $page = $request->get('page', 1); // Current page, default to 1
        $perPage = $request->get('perPage', 10); // Results per page, default to 10

        // Initialize query
        $query = Customer::query();

        // Search across multiple fields
        if ($searchReq) {
            $searchTerm = '%' . $searchReq . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'like', $searchTerm)
                    ->orWhere('last_name', 'like', $searchTerm)
                    ->orWhere('phone_number', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm)
                    ->orWhere('alternate_number', 'like', $searchTerm);
            });
        }

        // Calculate pagination data
        $totalCount = $query->count(); // Total count should be done before pagination
        $customers = $query->skip(($page - 1) * $perPage)->take($perPage)->get(['id', 'first_name', 'last_name', 'phone_number']); // Select needed columns

        // Calculate total pages
        $totalPages = ceil($totalCount / $perPage);

        // Return results in JSON format
        return response()->json([
            'results' => $customers,
            'totalCount' => $totalCount,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }


    public function update(Request $request, $customerId)
    {

        // $request->validate([
        //     'customer_name' => 'required|string|max:255',
        // ]);

        // Find the customer by ID
        $customer = Customer::findOrFail($customerId);

        // Update the customer's name
        $customer->name = $request->input('customer_name');
        $customer->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Customer updated successfully');
    }

    public function changeStatus($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = !$customer->status;
        $customer->save();

        return redirect()->back()->with('success', 'Status changed successfully!');
    }
}
