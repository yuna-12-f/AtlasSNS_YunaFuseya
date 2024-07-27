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
        $posts = Post::get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function newPostCreate(Request $request)
    {
        $request->validate([
            'post' => 'required|unique:posts|min:1|max:150',
        ]);

        $post = $request->input('post');
        $user_id = Auth::user()->id;
        // dd($request);
        Post::create(['post' => $post, 'user_id' => $user_id]);
        return back();
    }

    public function postUpdate(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        Post::where('id', $id)->update(['post' => $up_post]);
        return redirect('/top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
