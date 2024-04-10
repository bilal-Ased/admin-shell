<?php

namespace App\Http\Controllers;

use App\DataTables\BrandDataTable;
use App\Models\Brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('brands.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:brands,name',
        ]);

        Brand::create($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand added successfully!');
    }

    public function edit($brandId)
    {
        $brand = Brand::findOrFail($brandId);

        return view('brands.edit', ['brand' => $brand]);
    }

    public function update(Request $request, $brandId)
    {
        $request->validate(['name' => 'required|unique:brands,name']);
        $brand = Brand::findOrFail($brandId);
        $brand->name = $request->input('name');
    }
}
