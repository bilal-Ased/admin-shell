<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{


    public function index(CustomerDataTable $dataTable)
    {

        $response = $dataTable->render('customers.index');
        return $response;
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => [
                'required',
                'regex:/^(?:\+254|0)(?:7|1)[0-9]{8}$/', // Validates Kenyan numbers
                'unique:customers,phone_number', // Ensure phone number is unique in the 'customers' table
            ],
            'email' => 'nullable|email|unique:customers,email', // Email must be unique in the 'customers' table
            'status' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customerData = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'email',
            'status',
            'age',
        ]);

        // If allergy information is present, include it in the profile creation process
        if (
            $request->filled('allergy') ||
            $request->has('bleeding') ||
            $request->has('heart_disease') ||
            $request->has('drug_therapy') ||
            $request->has('pregnancy')
        ) {
            // Create the customer first
            $customer = Customer::create($customerData);

            // Create the customer profile+
            $profile = $customer->customerProfile()->create([
                'customer_id' => $customer->id,
                'allergy' => $request->input('allergy'),
                'bleeding' => $request->has('bleeding') ? 1 : 0, // Default to 0 if not checked
                'heart_disease' => $request->has('heart_disease') ? 1 : 0,
                'drug_therapy' => $request->has('drug_therapy') ? 1 : 0,
                'pregnancy' => $request->has('pregnancy') ? 1 : 0,
            ]);




            // Update the customer record with the profile ID
            $customer->update([
                'customer_profile_id' => $profile->id,
            ]);

            return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
        } else {
            // Create only the customer
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
        $query = Customer::query()->with('customerProfile'); // Include customer profiles (allergies)

        // Search across multiple fields
        if ($searchReq) {
            $searchTerm = '%' . $searchReq . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'like', $searchTerm)
                    ->orWhere('last_name', 'like', $searchTerm)
                    ->orWhere('phone_number', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm);
            });
        }

        $totalCount = $query->count(); // Total count should be done before pagination
        $customers = $query->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get(['id', 'first_name', 'last_name', 'phone_number', 'email', 'created_at']); // Select needed columns

        foreach ($customers as $customer) {
            $customer->allergies = DB::table('customer_profiles')
                ->where('customer_id', $customer->id)
                ->pluck('allergy');
        }

        $totalPages = ceil($totalCount / $perPage);

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
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->phone_number = $request->input('phone_number');
        $customer->email = $request->input('email');
        // $customer->alternate_number = $request->input('alternate_number');
        $customer->age = $request->input('age');
        // $customer->gender = $request->input('gender');
        $customer->allergy = $request->input('allergy'); // Add allergy or other fields as needed
        $customer->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Customer updated successfully');


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

    public function customerActivity($encryptedCustomerId)
    {
        try {
            // Decrypt the customer ID
            $customerId = Crypt::decrypt($encryptedCustomerId);

            // Fetch the customer data
            $customer = Customer::findOrFail($customerId);

            // Fetch appointments for the customer
            $appointments = Appointment::where('customer_id', $customerId)
                ->with('updates') // Load related updates for appointments
                ->orderBy('appointment_date', 'asc')
                ->get();

            // Return the view with data
            return view('customers.history', [
                'customer' => $customer,
                'appointments' => $appointments,
            ]);
        } catch (\Exception $e) {
            // Handle tampered or invalid ID
            abort(404, 'Invalid customer link.');
        }
    }
}
