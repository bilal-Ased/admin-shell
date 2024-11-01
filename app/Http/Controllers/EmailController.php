<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Models\Email;
use GuzzleHttp\Client;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = $this->getMessages();
        // Pass the messages to the view
        return view('inbox.index', compact('messages'));
    }


    private function getMessages()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://api.eu.nylas.com/v3/grants/bd40b7d8-73bc-40f2-8390-14ea41175057/messages', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer nyk_v0_NPPpAYIL35ErLeiBguB2GKVcv1iNo3lYqcDgyTUUAnxDNlFgoIVUFk1eToQBYfdo',
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'limit' => 5,
                'unread' => true,
            ],
        ]);

        $messages = json_decode($response->getBody(), true);

        return $messages;
    }

    /**
     */
    public function respondView($mail_id)
    {
        $messages = $this->getMessages()['data'];
        $message = null;
        foreach ($messages as $msg) {
            if ($msg['id'] === $mail_id) {
                $message = $msg;
            }
        }


        return view('inbox.respond', ['message' => $message]);
    }

    public function respond($mail_id)
    {
        $client = new Client();

        $content = request()->input('content');
        $name = 'Bilal Mughal';
        $reply_to = 'bilal.mughal@calltronix.com';

        // Get the original message details
        $messages = $this->getMessages()['data'];
        $message = null;
        foreach ($messages as $msg) {
            if ($msg['id'] === $mail_id) {
                $message = $msg;
            }
        }

        if ($message) {
            // Prepare the reply payload
            $reply = [
                'subject' => 'Re: ' . $message['subject'],
                'to' => [['email' => $message['from'][0]['email'], 'name' => $message['from'][0]['name']]],
                'reply_to_message_id' => $message['id'],
                'body' => $content,
                'from' => [
                    'email' => $reply_to,
                    'name' => $name,
                ],
            ];

            // Send the reply using the correct Nylas API endpoint
            try {
                $response = $client->request('POST', 'https://api.nylas.com/send', [
                    'headers' => [
                        'Authorization' => 'Bearer nyk_v0_NPPpAYIL35ErLeiBguB2GKVcv1iNo3lYqcDgyTUUAnxDNlFgoIVUFk1eToQBYfdo',
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $reply,
                ]);

                return redirect()->back()->with('success', 'Reply sent successfully!');
            } catch (\Exception $e) {

                dd($e);
                return redirect()->back()->with('error', 'Failed to send reply: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Original message not found.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreEmailRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateEmailRequest $request, Email $email)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        //
    }
}
