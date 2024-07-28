<?php

namespace App\Http\Controllers;


use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{


    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }

    public function follow(Request $request)
    {
        //$followingId = Auth::id();
        $userId = $request->input('user_id');

        //フォローしているかチェックする
        // $follow = Follow::where('following_id', $followingId)
        //     ->where('followed_id', $userId)
        //     ->first();

        $follow = Auth::user()->isfollowing($userId);
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

        $follow = Auth::user()->isfollowed($userId);
        //dd($follow);

        if ($follow) {
            Auth::user()->unfollow($userId);
        }

        return redirect()->back();
    }
}
