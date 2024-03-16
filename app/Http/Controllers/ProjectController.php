<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Project;
use App\Models\Quote;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $materials = Material::all();

        return view('projects.create', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'customer_id' => 'required|exists:customers,id',
            'materials' => 'required|array',
            'materials.*.id' => 'exists:materials,id',
            'materials.*.quantity' => 'required|integer|min:1',
        ]);

        $project = Project::create($request->only('name', 'customer_id'));

        foreach ($request->materials as $material) {
            $project->materials()->attach($material['id'], ['quantity' => $material['quantity']]);
        }

        // Automatically generate quote
        $totalPrice = $this->calculateTotalPrice($project);
        Quote::create(['total_price' => $totalPrice, 'project_id' => $project->id]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    private function calculateTotalPrice($project)
    {
        $totalPrice = 0;
        foreach ($project->materials as $material) {
            $totalPrice += $material->pivot->quantity * $material->price; // Assuming each material has a price attribute
        }

        return $totalPrice;
    }

    public function show(Project $project)
    {
        $quote = Quote::where('project_id', $project->id)->first();
        $totalPriceKsh = $quote ? $this->convertToKsh($quote->total_price) : null;

        return view('projects.show', compact('project', 'quote', 'totalPriceKsh'));
    }

    private function convertToKsh($amount)
    {
        // Convert amount to Ksh (assuming 1 USD = 100 Ksh)
        return $amount * 100;
    }

    public function edit(Project $project)
    {
        $materials = Material::all();

        return view('projects.edit', compact('project', 'materials'));
    }

    public function update(Request $request, Project $project)
    {
        // Implement update logic
    }

    public function destroy(Project $project)
    {
        // Implement destroy logic
    }
}
