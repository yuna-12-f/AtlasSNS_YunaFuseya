<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
    }

    public function newPostCreate(Request $request)
    {
        $post = $request->input('main');
        $user_id = Auth::user()->id;
        // dd($request);
        Post::create(['post' => $post, 'user_id' => $user_id]);
        return back();
    }
}
