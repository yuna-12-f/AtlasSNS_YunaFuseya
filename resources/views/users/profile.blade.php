@extends('layouts.login')

@section('content')
    {{-- @foreach ($errors->all() as $error)
        <li class="error_list">{{ $error }}</li>
    @endforeach --}}



    <div class="profile_container">
        {!! Form::open([
            'url' => '/profile/update',
            'enctype' => 'multipart/form-data',
            'class' => 'profile_form_container',
        ]) !!}
        @csrf
        {{ Form::hidden('id', Auth::user()->id) }}

        @if (Auth::user()->images == 'icon1.png')
            {{-- icon1だったら --}}
            {{-- icon1だった時の文 --}}
            <img class="logo profile_icon" src="{{ asset('images/' . Auth::user()->images) }}">
        @else
            {{-- icon1以外だった場合 --}}
            <img class="logo profile_icon" src="{{ asset('storage/user-images/' . Auth::user()->images) }}">
        @endif

        <div class="profile_form">
            <div class="update_block">
                <label for="name" class="profile_username">ユーザー名</label>
                <input class="profile_input" type="text" name="username" value="{{ Auth::user()->username }}">
                @error('username')
                    <li class="error_list">{{ $message }}</li>
                @enderror
            </div>
            <div class="update_block">
                <label for="mail" class="profile_mail">メールアドレス</label>
                <input class="profile_input" type="mail" name="mail" value="{{ Auth::user()->mail }}">
                @error('mail')
                    <li class="error_list">{{ $message }}</li>
                @enderror
            </div>
            <div class="update_block">
                <label for="pass" class="profile_pass">パスワード</label>
                <input class="profile_input" type="password" name="password" value="">
                @error('password')
                    <li class="error_list">{{ $message }}</li>
                @enderror
            </div>
            <div class="update_block">
                <label for="pass" class="profile_pass_con">パスワード確認</label>
                <input class="profile_input" type="password" name="password_confirmation" value="">
                @error('password_confirmation')
                    <li class="error_list">{{ $message }}</li>
                @enderror
            </div>
            <div class="update_block">
                <label for="name" class="profile_bio">自己紹介</label>
                <input class="profile_input" type="text" name="bio" value="{{ Auth::user()->bio }}">
                @error('bio')
                    <li class="error_list">{{ $message }}</li>
                @enderror
            </div>
            <div class="update_block">
                <label for="name" class="profile_image">アイコン画像</label>
                <input class="profile_input_image" type="file" name="images" value="">
                @error('images')
                    <li class="error_list">{{ $message }}</li>
                @enderror
            </div>
            <input type="submit" class="btn-primary_unfollow profile_btn" value="更新">
            {{ Form::token() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
