<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    // View home page
    public function index()
    {
        return view('home.index');
    }

    // View about page
    public function about()
    {
        return view('home.about');
    }
}
