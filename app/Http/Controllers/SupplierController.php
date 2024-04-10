<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(SupplierDataTable $dataTable)
    {
        return $dataTable->render('suppliers.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:suppliers,email',
            'phone' => 'nullable',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');

    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $suppliers = Supplier::where('name', 'like', '%'.$query.'%')->get();

        return response()->json($suppliers);
    }
}
