<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends Controller
{
    // View news page
    public function index()
    {
        $news_items = News::latest()->get();
        return view('news.index', compact('news_items'));
    }

    // Admin add news
    public function create()
    {
        return view('news.create');
    }

    // Admin store news
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->body = $request->body;
        $coverPath = $request->file('cover')->store('public/images/covers');
        $news->cover_photo_path = str_replace('public/', 'storage/', $coverPath);
        $news->save();

        return redirect()->route('news.index')->with('status', 'News created successfully!');
    }

    // Admin edit news
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Admin update news
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if ($request->hasFile('cover')) {
            if ($news->cover_photo_path !== 'images/covers/placeholder.png') {
                Storage::delete(str_replace('storage/', 'public/', $news->cover_photo_path));
            }
            $coverPath = $request->file('cover')->store('public/images/covers');
            $news->update(['cover_photo_path' => str_replace('public/', 'storage/', $coverPath)]);            
        }

        return redirect()->route('news.index')->with('status', 'News updated successfully!');
    }

    // Admin delete news
    public function delete(News $news)
    {
        if ($news->cover_photo_path !== 'images/covers/placeholder.png') {
            Storage::delete(str_replace('storage/', 'public/', $news->cover_photo_path));
        }
        $news->delete();
        return redirect()->route('news.index')->with('status', 'News deleted successfully!');
    }
}
