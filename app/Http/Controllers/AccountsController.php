<?php

namespace App\Http\Controllers;

use App\DataTables\AccountDataTable;
use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index(AccountDataTable $dataTable)
    {
        return $dataTable->render('accounts.index');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:accounts,name',
            'number_of_agents' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);
        Accounts::create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account Added Successfully');
    }
}
