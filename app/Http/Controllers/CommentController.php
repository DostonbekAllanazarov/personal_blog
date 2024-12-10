<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $news_id)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'news_id' => $news_id,
            'content' => $validated['content'],
        ]);

        return redirect()->route('news.show', $news_id);
    }
}
