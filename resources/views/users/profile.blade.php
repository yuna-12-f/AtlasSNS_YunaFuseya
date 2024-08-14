@extends('layouts.login')

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach



    <div class="profile_container">
        {!! Form::open([
            'url' => '/profile/update',
            'enctype' => 'multipart/form-data',
            'class' => 'profile_form_container',
        ]) !!}
        @csrf
        {{ Form::hidden('id', Auth::user()->id) }}
        <img class="logo profile_icon" src="{{ asset('storage/user-images/' . Auth::user()->images) }}">

        <div class="profile_form">
            <div class="update_block">
                <label for="name" class="profile_username">ユーザー名</label>
                <input class="profile_input" type="text" name="username" value="{{ Auth::user()->username }}">
            </div>
            <div class="update_block">
                <label for="mail" class="profile_mail">メールアドレス</label>
                <input class="profile_input" type="mail" name="mail" value="{{ Auth::user()->mail }}">
            </div>
            <div class="update_block">
                <label for="pass" class="profile_pass">パスワード</label>
                <input class="profile_input" type="password" name="password" value="">
            </div>
            <div class="update_block">
                <label for="pass" class="profile_pass_con">パスワード確認</label>
                <input class="profile_input" type="password" name="password_confirmation" value="">
            </div>
            <div class="update_block">
                <label for="name" class="profile_bio">自己紹介</label>
                <input class="profile_input" type="text" name="bio" value="{{ Auth::user()->bio }}">
            </div>
            <div class="update_block">
                <label for="name" class="profile_image">アイコン画像</label>
                <input class="profile_input_image" type="file" name="images" value="">
            </div>
            <input type="submit" class="btn-primary_unfollow profile_btn" value="更新">
            {{ Form::token() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
