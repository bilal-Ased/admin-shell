<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function getResponse(Request $request)
    {
        $data = $request->all();
        Log::info(response()->json($request->all()));

    }
}
