<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(CompanyDataTable $datatable)
    {
        return $datatable->render('company.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies,name',
        ]);

        $company = new Company($request->all());
        $company->created_by = auth()->id(); // Set the created_by field to the ID of the authenticated user
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company added successfully!');

    }
}
