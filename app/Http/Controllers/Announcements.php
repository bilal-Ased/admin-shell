<?php

namespace App\Http\Controllers;

use App\Models\Announcements as ModelsAnnouncements;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Announcements extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("announcements.index",compact('users'));

    }


  public function store(Request $request)
{

    // Validate request data
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'mention_users' => 'required|exists:users,id', // Add validation for the tagged user ID
    ]);



    // Get the currently authenticated user ID
    $taggingUserId = auth()->id();

    // Get the tagged user ID from the request
    $taggedUserId = $request->input('mention_users');

    // Use a database transaction to ensure data integrity
    DB::beginTransaction();

    try {
        // Create the announcement
        $announcement = ModelsAnnouncements::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // Attach the currently authenticated user to the announcement as the tagger
        $announcement->users()->attach($taggingUserId, ['tagged_by' => $taggingUserId]);

        // Attach the tagged user to the announcement
        $announcement->users()->attach($taggedUserId, ['tagged_by' => $taggingUserId]);

        // Commit the transaction
        DB::commit();

        return response()->json(['message' => 'Announcement created successfully'], 201);
    } catch (\Exception $e) {
        // Rollback the transaction in case of an error
        DB::rollBack();

        return response()->json(['error' => 'Failed to create announcement'], 500);
    }
}


    public function show(Announcements $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
