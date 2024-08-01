<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Hash;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }

    //
    public function profile()
    {
        return view('users.profile');
    }

    public function otherprofile()
    {
        return view('users.otherprofile');
    }

    public function otherProfileUpdate($id)
    {
        //dd($id);
        //$user = Auth::user();
        //$other_ids = $user->followed()->pluck('followed_id');
        $user = User::findOrFail($id);
        //dd($user);
        $posts = Post::where('user_id', $id)->get();

        //ユーザー情報をviewに渡す。
        return view('users.otherprofile', compact('user', 'posts'));
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|email|min:5|max:40|unique:users,mail',
            'password' => 'required|alpha-num|min:8|max:20',
            'password_confirmation' => 'required|alpha-num|min:8|max:20|same:password',
            'bio' => 'nullable|string|max:150',
            'images' => 'file|mimes:jpg,jpeg,png'
        ]);

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->file('images');


        User::where('id', $id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($request->password), //ハッシュ化
            'bio' => $bio,
            'images' => $images
        ]);

        return redirect('/top');
    }

    public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if (!empty($keyword)) {
            $users = User::where('username', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = User::all();
        }
        //3つ目の処理
        return view('users.search', compact('users', 'keyword'));
    }
}
