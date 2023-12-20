<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required|exists:posts,id',
            'parent' => 'nullable|exists:comments,id',
            'content' => 'required|string'
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $request->post;
        $comment->parent_id = $request->parent ?? null;
        $comment->content = $request->content;
        $comment->save();
        return back();
    }
}
