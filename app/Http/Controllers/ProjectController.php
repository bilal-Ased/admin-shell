<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Models\Material;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('projects.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'customer_id' => 'required|exists:customers,id',
            'material_id' => 'required|array',
            'material_id.*' => 'exists:materials,id', // Validate each material ID in the array
            'budget' => 'required|numeric', // Ensure budget is numeric
        ]);

        // Serialize the array of material IDs
        $materialIds = json_encode($validatedData['material_id']);

        // Create the project and store the serialized material IDs
        $project = Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'customer_id' => $validatedData['customer_id'],
            'material_id' => $materialIds,
            'budget' => $validatedData['budget'],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function calendar()
    {
        $projects = Project::all();

        return view('projects.calendar', compact('projects'));
    }

    public function destroy(Project $project)
    {
        // Implement destroy logic
    }

    public function searchMaterials(Request $request)
    {
        $query = $request->input('q');

        $materials = Material::where('name', 'like', '%'.$query.'%')->get();

        return response()->json($materials);
    }
}
