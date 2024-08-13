<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{

    public function index(){

        return view('chatbot');
    }

    public function createSession(Request $request)
    {

        $response = Http::withHeaders([
            'Accept' => 'application/json, text/plain, */*',
            'Accept-Language' => 'en',
            'Content-Type' => 'application/json',
        ])->post('https://www.askyourdatabase.com/api/chatbot/session', [
            'secretKey' => '6057699c1596533b8ea77d9d172887a0',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return response()->json($response->json());
    }
}
