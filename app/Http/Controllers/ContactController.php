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

    public function admin()
    {
        $contacts = Contact::all();
        return view('contact.admin', ['contacts' => $contacts]);
    }
}
