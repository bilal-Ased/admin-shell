<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class chatwootController extends Controller
{
    public function getResponse(Request $request)
    {
        $payload = $request->all();
        Log::info('Webhook Payload: '.json_encode($payload));

        // Respond with a success message
        return response()->json(['message' => 'Webhook processed successfully']);
    }
}
