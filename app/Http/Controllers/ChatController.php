<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view("chat.index");
    }


    public function sendMessage(Request $request)
    {
        $user = auth()->user()->username;
        $message = $request->input('message');

        event(new ChatMessage($user, $message));

        return response()->json(['status' => 'Message sent!']);


        }
}

