<?php

namespace App\Http\Controllers;


use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    protected $fillable = [
        'following_id',
        'followed_id',
    ];

    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }

    public function follow(Request $request,)
    {
        $followerId = Auth::id();
        $userId = $request->input('user_id');

        $follow = Follow::where('following_id', $followerId)
            ->where('followed_id', $userId)
            ->first();

        if ($follow) {
            $follow->delete();
        } else {
            Follow::create([
                'following_id' => $followerId,
                'followed_id' => $userId,
            ]);
        }

        return redirect('/search');
    }
}
