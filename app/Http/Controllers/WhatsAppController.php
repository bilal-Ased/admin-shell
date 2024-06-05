<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function index()
    {
        return view('whatsapp.index');
    }

    public function getResponse(Request $request)
    {

        $data = $request->all();
        //Log::info(response()->json($request->all()));

        return $this->sendMessage($data['from_phone'], $data['from_name']);

    }

    public function sendMessage($phone, $sender_name)
    {
        $postParams = [
            'phone' => (string) $phone,
            'message_type' => 'text',
            'message' => 'Hello '.$sender_name.', thank your message!',
        ];
        $response = (object) json_decode(Http::withToken($this->getToken())->post('https://fastapi-orldqyq52q-ey.a.run.app/whatsapp/send/message', $postParams)->getBody(), true);

        return $response;
    }

    private function getToken()
    {
        $post_parameters = [
            'client_id' => env('WHATSAPP_CLIENT_ID'),
            'client_secret' => env('WHATSAPP_SECERT'),
        ];

        // Make the API request and decode the JSON response
        $response = Http::post('https://fastapi-orldqyq52q-ey.a.run.app/token', $post_parameters);

        // Check if the response was successful
        if ($response->successful()) {
            $responseBody = json_decode($response->getBody()->getContents(), true);

            // Log the entire response body
            Log::info('API Response: ', $responseBody);

            // Check if the 'access_token' key exists in the response body
            if (isset($responseBody['access_token'])) {
                $token = $responseBody['access_token'];

                // Log the access token
                Log::info('Access Token: '.$token);

                return $token;
            } else {
                // Log if the access token was not found
                Log::error('Access token not found in the response.');

                return null;
            }
        } else {
            // Log if the response was not successful
            Log::error('API request failed with status: '.$response->status());

            return null;
        }
    }
}
