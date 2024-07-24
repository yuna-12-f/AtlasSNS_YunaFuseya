<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

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

    public function updateProfile(Request $request)
    {

        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|email|min:5|max:40|unique:users,email',
            'password' => 'required|alpha-num|min:8|max:20',
            'password_confirmation' => 'required|alpha-num|min:8|max:20|same:password',
            'bio' => 'string|max:150',
            'images' => 'file|mimes:jpg,jpeg,png'
        ]);

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        //$images = $request->input('images');

        User::where('id', $id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => Hash::make($request->password), //ハッシュ化
            'bio' => $bio,
            //'images' => $images
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
        return view('users.search', ['users' => $users]);
    }
}
