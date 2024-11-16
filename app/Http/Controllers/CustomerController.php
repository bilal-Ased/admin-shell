<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{


    public function index(CustomerDataTable $dataTable)
    {

        $response = $dataTable->render('customers.index');
        return $response;
    }


    public function store(Request $request)
    {

        $customerData = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'alternate_number',
            'email',
            'status',
            'date_of_birth',
            'gender'
        ]);

        // If allergy information is present, include it in the profile creation process
        if ($request->filled('allergy')) {
            // Create the customer and the customer profile with allergy info
            $customer = Customer::create($customerData);
            $customer->customerProfile()->create([
                'customer_id' => $customer->id,
                'allergy' => $request->input('allergy'),
            ]);

            return redirect()->route('customers.index')->with('success', 'Customer and profile added successfully!');
        } else {
            // Otherwise, create only the customer without a profile
            $customer = Customer::create($customerData);

            return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
        }
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
        $customers = $query->skip(($page - 1) * $perPage)->take($perPage)->get(['id', 'first_name', 'last_name', 'phone_number', 'email', 'created_at']); // Select needed columns

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


    public function customerActivity($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        // Assuming you have an Appointment model and a relationship defined
        $appointments = Appointment::where('customer_id', $customerId)
            ->orderBy('appointment_date', 'desc') // Order by date
            ->get();

        return view('customers.history', [
            'customer' => $customer,
            'appointments' => $appointments,
        ]);
    }
}
