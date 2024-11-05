<?php

namespace App\Http\Controllers;

use App\DataTables\InsuranceDataTable;
use App\Models\Insurnace;
use Illuminate\Http\Request;

class IsuranceController extends Controller
{
    public function index(InsuranceDataTable $dataTable)
    {
        $response = $dataTable->render('settings.insurance.index');
        return $response;
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'unique:insurnaces,name|required']);

        Insurnace::create($request->all());

        return redirect()->route('isurance.index')->with('success', 'Insurance added successfully!');
    }



    public function getInsurnace(Request $request)
    {
        $insurnace_id = request()->insurnace_id;
        $data = Insurnace::where('name', 'like', '%' . $request->searchItem . '%')
            ->when($insurnace_id, function ($q) use ($insurnace_id) {
                $q->where('insurnace_id', $insurnace_id);
            });
        return $data->paginate(10, ['*'], 'page', $request->page);
    }
}
