<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use App\DataTables\CustomerDataTable;
use Spatie\Newsletter\Facades\Newsletter;

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
            'phone_number' => 'required',
            'alternate_number'=>'nullable',
            'email' => 'nullable|email',
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
        $customer->status = !$customer->status;
        $customer->save();
        return redirect()->back()->with('success', 'Status changed successfully!');

    }
}
