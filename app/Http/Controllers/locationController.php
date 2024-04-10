<?php

namespace App\Http\Controllers;

use App\DataTables\LocationsDataTable;
use App\Models\Location;
use Illuminate\Http\Request;

class locationController extends Controller
{
    public function index(LocationsDataTable $dataTable)
    {
        return $dataTable->render('locations.index');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:locations,name']);

        $request = Location::create($request->all());

        return redirect()->route('location.index')->with('success', 'location added successfully');
    }
}
