<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpDeskController extends Controller
{
    public function index()
    {
        return view('HelpDesk.index');
    }
}