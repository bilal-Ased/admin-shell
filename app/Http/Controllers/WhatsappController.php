<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsappController extends Controller
{
    public function getResponse(Request $request)
    {

        $data = $request->all();

        Log::info('All Request', $data);
    }
}
