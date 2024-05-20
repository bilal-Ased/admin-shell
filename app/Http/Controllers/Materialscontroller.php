<?php

namespace App\Http\Controllers;

use App\DataTables\MaterialsDataTable;
use App\Exports\MaterialsExport;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Materialscontroller extends Controller
{
    public function index(MaterialsDataTable $dataTable)
    {

        return $dataTable->render('materials.index');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'location_id' => 'required|exists:locations,id',
            'quantity_on_hand' => 'required|integer|min:0',
            'brand_id' => 'required|exists:brands,id',
            'serial_number' => 'required',
            'account_id' => 'required',

        ], [
            'name.required' => 'Material name is required.',
            'location_id.required' => 'Location is required.',
            'brand_id.required' => 'Brand is required.',
            'quantity_on_hand.required' => 'Quantity on hand is required.',
            'quantity_on_hand.integer' => 'Quantity on hand must be an integer.',
            'quantity_on_hand.min' => 'Quantity on hand must be greater than or equal to 0.',
            'serial_number.required' => 'serial Number is Required',
            'account.required' => 'Account Number is Required',
        ]);

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

    public function export()
    {
        return Excel::download(new MaterialsExport, 'products.xlsx');

    }

    public function getBrands(Request $request)
    {

        $data = DB::table('brands')
            ->select('id', 'name')
            ->when($request->has('q'), function ($query) use ($request) {
                $search = $request->q;
                $query->where('name', 'LIKE', "%$search%");
            })->take(10)->get();

        return response()->json($data);

    }

    public function getLocations(Request $request)
    {
        $data = DB::table('locations')
            ->select('id', 'name')
            ->when($request->has('q'), function ($query) use ($request) {
                $search = $request->q;
                $query->where('name', 'LIKE', "%$search%");
            })->take(10)->get();

        return response()->json($data);

    }

    public function getAccounts(Request $request)
    {
        $data = DB::table('accounts')
            ->select('id', 'name')
            ->when($request->has('q'), function ($query) use ($request) {
                $search = $request->q;
                $query->where('name', 'LIKE', "%$search%");
            })->take(10)->get();

        return response()->json($data);
    }
}
