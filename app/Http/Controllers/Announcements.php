<?php

namespace App\Http\Controllers;

use App\Models\Announcements as ModelsAnnouncements;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Announcements extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("announcements.index",compact('users'));

    }


  public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'mention_users' => 'required',
    ]);

    $mention_users = request()->mention_users;

    $users = Str::after($mention_users, '@');

    $users = User::where('username', $users)->get();

   try {
        $announcement = ModelsAnnouncements::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $userId = auth()->id();

        $announcement->users()->attach($userId, ['tagged_by' => $userId]);
        $announcement->users()->attach($users->pluck('id'), ['tagged_by' => $userId]);

        return redirect()->back()->with('success', 'Announcement created successfully');
    } catch (\Exception $e) {
        Log::error('Failed to create announcement: ' . $e->getMessage());

        return redirect()->back()->with('error', 'Failed to create announcement');

    }


}


    public function show(Announcements $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
