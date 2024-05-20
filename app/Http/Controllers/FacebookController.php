<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FacebookController extends Controller
{
    public function __construct()
    {
        $this->middleware('web')->except('getResponse');
    }

    public function index()
    {
        return view('facebook.index');
    }

    public function fetchResponse(Request $request)
    {

        $hubVerifyToken = '123'; // Replace with your verify token

        $hubMode = $request->input('hub_mode');
        $hubVerifyTokenReceived = $request->input('hub_verify_token');
        $hubChallenge = $request->input('hub_challenge');

        if ($hubMode === 'subscribe' && $hubVerifyTokenReceived === $hubVerifyToken) {
            return response($hubChallenge, 200);
        }

        return response('Invalid verify token', 403);
    }

    // Method to handle webhook response
    public function getResponse(Request $request)
    {

        // // Extract sender's ID from the incoming message payload
        // $senderId = '7286655941451566'; // Assuming this is the sender's ID

        // // Message content
        // $message = 'Hello! This bilal from laravel.';

        // // Initialize Facebook SDK
        // $fb = new Facebook([
        //     'app_id' => env('FACEBOOK_APP_ID'),
        //     'app_secret' => env('FACEBOOK_APP_SECRET'),
        //     'default_graph_version' => 'v12.0',
        // ]);

        // try {
        //     // Send a message using the send API
        //     $response = $fb->post('/me/messages', [
        //         'recipient' => ['id' => $senderId],
        //         'message' => ['text' => $message],
        //     ], env('FACEBOOK_PAGE_ACCESS_TOKEN'));

        //     // Handle response
        //     $graphNode = $response->getGraphNode();

        //     return response()->json(['status' => 'success', 'message_id' => $graphNode->getField('message_id')]);
        // } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        //     // Handle error
        //     return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        // } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        //     // Handle error
        //     return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        // }

        // // Replace 'your_page_access_token' with your actual Page Access Token
        $pageAccessToken = env('FACEBOOK_PAGE_ACCESS_TOKEN');

        // Initialize Guzzle HTTP client
        $client = new Client();

        // Make a GET request to fetch conversations from Facebook Messenger
        $response = $client->get('https://graph.facebook.com/v12.0/me/conversations', [
            'query' => [
                'access_token' => $pageAccessToken,
                'fields' => 'participants{name},messages{message}',
            ],
        ]);

        // Decode the response body
        $conversations = json_decode($response->getBody(), true)['data'] ?? [];

        // Log fetched conversations
        Log::info('Fetched conversations from Facebook Messenger:', $conversations);

        // Return a response indicating success
        return response()->json(['message' => 'Conversations fetched successfully']);
    }

    // Initialize Guzzle HTTP client

    // Return a response indicating success

    // // Replace 'your_page_access_token' with your actual Page Access Token
    // $pageAccessToken = 'EAAFBdAxCedEBO0DCEELosdi53wmGE2j3p6OQEzBvNLuIJKqSLMF4VrFbZAlggBjWQlDZAxvOHAxeKUPBoHt5MlmKJshPY8fcbDQunPUSJSimRIEKHdj7x3o5sKV2CgZBi7HZBHbZB3E6IrNsaXYRAc02DgtHFbUFQJgDdBenyNXWAS0EvK22ijxW8UbsMeIXk1GNZAQmnd';

    // // Initialize Guzzle HTTP client
    // $client = new Client();

    // // Make a GET request to fetch messages from Facebook Messenger
    // $response = $client->get('https://graph.facebook.com/v12.0/me/conversations', [
    //     'query' => [
    //         'access_token' => $pageAccessToken,
    //     ],
    // ]);

    // // Decode the response body
    // $messages = json_decode($response->getBody(), true)['data'] ?? [];

    // // Log fetched messages
    // Log::info('Fetched messages from Facebook Messenger:', $messages);

    // // Return a response indicating success
    // return response()->json(['message' => 'Messages fetched successfully']);
}

// $payload = $request->all();
// Log::info('Webhook Payload: '.json_encode($payload));

// // Respond with a success message
// return response()->json(['message' => 'Webhook processed successfully']);
