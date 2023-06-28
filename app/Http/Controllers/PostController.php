<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\FileService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'file'=>'required|mimes:jpg,jpeg,png',
            'text' => 'required'
        ]);
        $post = new Post;
        $post = (new FileService)->updateFile($post, $request, 'post');
        $post->user_id = auth()->id();
        $post->text = $validData['text'];
        $post->save();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!empty($post->file)) {
            $currentFile = public_path() . $post->file;

            if (file_exists($currentFile)){
                unlink($currentFile);
            }
        }
        $post->delete();
    }
}
