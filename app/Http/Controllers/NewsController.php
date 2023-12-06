<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news_items = News::all();
        return view('news.index', compact('news_items'));
    }
}
