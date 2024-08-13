<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    

    public function index()
    {
        return view('landing-pages.pages.contact-us');
    }




    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'nullable',
            'agree_terms' => 'required|accepted',
        ]);
    
        Feedback::create($request->all());
    
        return redirect()->route('landing-pages.contact');
    }
    
}
