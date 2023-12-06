<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Your message has been sent!');
    }

    public function admin()
    {
        $contacts = Contact::all();
        return view('contact.admin', ['contacts' => $contacts]);
    }
}
