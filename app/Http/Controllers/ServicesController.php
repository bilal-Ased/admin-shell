<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
      return view('Services.index');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required',
        'price'=>'required'
    ]);
    Services::create($request->all());
    return redirect()->route('services.index')->with('success', 'Service added Successfully!');

    }
}
