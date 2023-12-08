<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // User view contact page
    public function index()
    {
        return view('contact.index');
    }

    // User send contact message
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|text'
        ]);

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Your message has been sent!');
    }

    // Admin view contact messages
    public function admin()
    {
        $contacts = Contact::all();
        return view('contact.admin', ['contacts' => $contacts]);
    }
}
