<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function sendMessage(Request $request)
    {
        $apiKey = 'https://5yp3dz.api.infobip.com'; // Replace with your Infobip API key
        $url = 'fcbe99cbe174cd1e753dbb0a2674a3de-e73c138e-0ac3-4c39-95b0-854618b462b2'; // Replace with your Infobip endpoint

        $client = new Client();

        // Example message data
        $messageData = [
            'from' => 'your_whatsapp_number',
            'to' => 'recipient_whatsapp_number',
            'text' => 'Hello, this is a WhatsApp message from Laravel!',
        ];

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'App ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $messageData,
            ]);

            $body = $response->getBody();
            $result = json_decode($body, true);

            Log::info('WhatsApp Message Sent:', $result);

            return response()->json(['status' => 'success', 'message' => 'WhatsApp message sent successfully']);
        } catch (\Exception $e) {
            Log::error('WhatsApp Message Sending Failed:', ['error' => $e->getMessage()]);

            return response()->json(['status' => 'error', 'message' => 'Failed to send WhatsApp message']);
        }
    }

}

