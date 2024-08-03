@extends('layouts.login')

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach


    <div class="container">
        <div class="update">
            {!! Form::open(['url' => '/profile/update', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            {{ Form::hidden('id', Auth::user()->id) }}
            <img class="update-icon" src="{{ asset('storage/user-images/' . Auth::user()->images) }}">
            <div class="update-form">
                <div class="update-block">
                    <label for="name">ユーザー名</label>
                    <input type="text" name="username" value="{{ Auth::user()->username }}">
                </div>
                <div class="update-block">
                    <label for="mail">メールアドレス</label>
                    <input type="mail" name="mail" value="{{ Auth::user()->mail }}">
                </div>
                <div class="update-block">
                    <label for="pass">パスワード</label>
                    <input type="password" name="password" value="">
                </div>
                <div class="update-block">
                    <label for="pass">パスワード確認</label>
                    <input type="password" name="password_confirmation" value="">
                </div>
                <div class="update-block">
                    <label for="name">自己紹介</label>
                    <input type="text" name="bio" value="{{ Auth::user()->bio }}">
                </div>
                <div class="update-block">
                    <label for="name">アイコン画像</label>
                    <input type="file" name="images">
                </div>
                <input type="submit" class="btn btn-danger">
                {{ Form::token() }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
