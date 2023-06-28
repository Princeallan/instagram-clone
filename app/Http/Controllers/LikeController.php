<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'post_id' => 'required'
        ]);

        $like = new Like;
        $like->user_id = auth()->id();
        $like->post_id = $validData['post_id'];
        $like->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        $like->delete();
    }
}
