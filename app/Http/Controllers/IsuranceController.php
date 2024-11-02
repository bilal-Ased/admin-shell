<?php

namespace App\Http\Controllers;

use App\Models\Insurnace;
use Illuminate\Http\Request;

class IsuranceController extends Controller
{
    public function index() {}

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        Insurnace::create($request->all());

        return redirect('settings.insurance.index');
    }
}
