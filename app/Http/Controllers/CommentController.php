<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;

class CommentController extends Controller
{
    public function postComment(News $news, Request $request)
    {
        $request->validate([
            'body' => 'required|string'
        ]);

        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'news_id' => $news->id
        ]);

        return redirect()->route('news.index')->with('success', 'Comment posted successfully!');
    }
}
