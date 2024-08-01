<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class FollowsController extends Controller
{


    public function followList()
    {
        $user = Auth::user();
        $followed_ids = $user->followed()->pluck('followed_id'); //ユーザーID取得。
        //dd($followed_ids);
        //$posts = Post::whereIn('user_id', $followed)->with('user')->select('posts.*', 'users.id as user_id')->join('users', 'posts.user_id', '=', 'users.id')->latest('posts.created_at')->get();
        $follow_users = User::whereIn('id', $followed_ids)->get();
        //ユーザーIDがfollowed_idsと一致したものを取得する。
        //dd($follow_users);

        $follow_posts = Post::whereIn('user_id', $followed_ids)->get();

        return view('follows.followList', compact('follow_users', 'follow_posts'));
    }

    public function followerList()
    {

        // ログインユーザーがフォローしているユーザーを取得
        $user = Auth::user();
        $following_ids = $user->followings()->pluck('following_id');
        //dd($following_ids);

        $follow_users = User::whereIn('id', $following_ids)->get();

        $follow_posts = Post::whereIn('user_id', $following_ids)->get();

        return view('follows.followerList', compact('follow_users', 'follow_posts'));
    }

    public function follow(Request $request)
    {
        //$followingId = Auth::id();
        $userId = $request->input('user_id');

        //フォローしているかチェックする
        // $follow = Follow::where('following_id', $followingId)
        //     ->where('followed_id', $userId)
        //     ->first();

        $follow = Auth::user()->isfollowing($userId); //フォローしているかどうかを確認。
        //dd($follow);

        if (!$follow) {
            // Follow::create([
            //     'following_id' => $followingId,
            //     'followed_id' => $userId,
            // ]);
            Auth::user()->follow($userId);
        }

        return redirect()->back();
    }

    public function unfollow(Request $request)
    {
        $userId = $request->input('user_id');
        $follow = Auth::user()->isfollowing($userId); //フォローしているかどうかを確認。

        if ($follow) {
            //dd($follow);
            Auth::user()->unfollow($userId);
        }

        return redirect()->back();
    }
}
