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

    public function update(Request $request, $customerId)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

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
        $customer->status = ! $customer->status;
        $customer->save();

        return redirect()->back()->with('success', 'Status changed successfully!');

    }
}
