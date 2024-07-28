<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index()
    {
        //$posts = Post::get();
        //return view('posts.index', ['posts' => $posts]);

        // 自分の投稿
        $user = Auth::user();
        $userId = $user->id;

        // 自分とフォローしているユーザーのIDを取得
        $followingIds = $user->followed()->pluck('followed_id')->toArray();
        $userIds = array_merge([$userId], $followingIds);

        // 投稿を取得（新しい順）
        $posts = Post::whereIn('user_id', $userIds)->orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
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
