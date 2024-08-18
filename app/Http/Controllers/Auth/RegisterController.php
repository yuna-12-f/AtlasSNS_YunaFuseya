<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller

//新規ユーザー情報を取得

{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $validated = $request->validate([
                'username' => 'required|min:2|max:40',
                'mail' => 'required|string|email|unique:users,mail|min:5|max:40',
                'password' => 'required|alpha_num|min:8|max:20|confirmed',
                //'password_confirmation' => 'required|alpha_num|min:8|max:20',
            ]);

            //入力した値を取得する。
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            //返信後に「username」「mail」「password」のデータが収納される。
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            session()->put('username', $username);

            return view('auth.added', compact('mail'));
        }
        return view('auth.register');
    }

    public function added()
    {
        return view('auth.added');
    }
}
