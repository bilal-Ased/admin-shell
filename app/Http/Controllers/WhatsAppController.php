<?php

namespace App\Http\Controllers;

use App\Models\WhatsappContact;
use App\Models\WhatsappMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function index()
    {

        // $whatsAppMessages = WhatsappMessage::with('contact')->get();

        $whatsappContacts = WhatsappContact::all();

        return view('whatsapp.index', compact('whatsappContacts'));
    }

    public function show($id)
    {
        $whatsApp = WhatsappMessage::find($id);

        return view('whatsapp.show', compact('whatsApp'));
    }

    public function getResponse(Request $request)
    {

        // Extract all data from the webhook request
        $data = $request->all();

        // Assign the values directly
        $company_id = $data['company_id'];
        $company_name = $data['company_name'];
        $from_phone = $data['from_phone'];
        $from_username = $data['from_username'];
        $message_id = $data['message_id'];
        $from_id = $data['from_id'];
        $text_body = $data['text_body'];
        $type = $data['type'];

        // Check if we already have this customer
        $whatsapp_contact = WhatsappContact::where('from_phone', $from_phone)->first();
        if (! $whatsapp_contact) {
            $whatsapp_contact = WhatsappContact::create([
                'from_phone' => $from_phone,
                'from_username' => $from_username,
                'company_id' => $company_id,
                'company_name' => $company_name,
            ]);
        }

        // Create a new WhatsappMessage instance with the data
        $message = new WhatsappMessage([
            'whatsapp_contact_id' => $whatsapp_contact->id,
            'message_id' => $message_id,
            'from_id' => $from_id,
            'text_body' => $text_body,
            'type' => $type,
        ]);

        // Save the message to the database
        $message->save();

        Log::info('Received data: ', $data);

        return $this->sendMessage($data['from_phone'], $data['from_name']);  // Change to 'from_phone'

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

    public function getContactMessages($contact_id)
    {
        $contact = WhatsappContact::find($contact_id);
        $whatsAppMessages = WhatsappMessage::where('whatsapp_contact_id', $contact->id)->get();

        return view('whatsapp.messages', ['whatsAppMessages' => $whatsAppMessages, 'contact' => $contact]);
    }
}
