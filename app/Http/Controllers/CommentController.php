<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->post_id = $validData['post_id'];
        $comment->user_id = $validData['user_id'];
        $comment->text = $validData['comment'];
        $comment->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
