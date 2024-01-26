<?php

namespace App\Http\Controllers;


use App\Events\PusherBrodcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebChatController extends Controller
{
    public function index(Request $request)
    {
        $message = $request->get('message');

        optional(Auth::user())->chatMessages()->create(['message' => $message]);

        if ($message !== null && is_string($message)) {
            event(new PusherBrodcast($message));
        }

        return view('webchat.index', ['user' => Auth::user()]);
    }

    public function brodcast(Request $request)
    {


        broadcast(new PusherBrodcast($request->get('message')))->toOthers();

        return view('webchat.brodcast', ['message' => $request->get('message')]);

    }

    public function receive(Request $request)
    {
        return view('webchat.receive', ['message' => $request->get('message')]);
    }
}
