<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string'
        ]);
        $comment = new Comment;
        
        $comment->create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => Auth::id()
            
        ]);

        $comment->save;

        return view('post.show', ['post' => $post]);
    }
}
