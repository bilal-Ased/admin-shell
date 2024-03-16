<?php

namespace App\Http\Controllers;

use App\DataTables\MaterialsDataTable;
use App\Models\Material;
use Illuminate\Http\Request;

class Materialscontroller extends Controller
{
    public function index(MaterialsDataTable $dataTable)
    {

        return $dataTable->render('materials.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'unit_price' => 'sometimes|required|numeric|min:0',
            'quantity_on_hand' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',

        ], [
            'name.required' => 'Material name is required.',
            'unit_price.required' => 'Unit price is required.',
            'unit_price.numeric' => 'Unit price must be a number.',
            'unit_price.min' => 'Unit price must be greater than or equal to 0.',
            'quantity_on_hand.required' => 'Quantity on hand is required.',
            'quantity_on_hand.integer' => 'Quantity on hand must be an integer.',
            'quantity_on_hand.min' => 'Quantity on hand must be greater than or equal to 0.',
        ]);

        // Ensure that 'unit_price' is present in the validated data
        if (! $request->filled('unit_price')) {
            return redirect()->back()->withInput()->withErrors(['unit_price' => 'Unit price is required.']);
        }

        Material::create($validatedData);

        return redirect()->route('materials.index')->with('success', 'Material added successfully!');

    }

    private function calculateReorderLevel(Material $material)
    {
        // Example logic to calculate reorder level (you can adjust this based on your specific criteria)
        $averageMonthlyConsumption = 50; // Example average monthly consumption rate
        $leadTimeInDays = 14; // Example lead time in days
        $safetyStockInDays = 7;

        $reorderLevel = $averageMonthlyConsumption * ($leadTimeInDays + $safetyStockInDays);

        return $reorderLevel;
    }
}
