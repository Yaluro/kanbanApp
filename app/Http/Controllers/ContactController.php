<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact message
        Contact::create([
            'user_id' => auth()->id(),
            'username' => $request->username,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->route('contact.create')->with('success', 'Message sent successfully.');
    }

    public function index()
    {
        $messages = Contact::all();
        return view('admin.messages', compact('messages'));
    }

    public function destroy(Contact $message)
    {
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message deleted successfully.');
    }
}
