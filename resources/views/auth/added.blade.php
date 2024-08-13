@extends('layouts.logout')

@section('content')
    <div id="clear">
        <div class="added_border">

            <div class="added_name">
                <p class="added_user">{{ session('username') }}さん</p>
                {{-- <p>{{ $mail }}</p> --}}
                <p>ようこそ！AtlasSNSへ！</p>
            </div>

            <div class="added_login">
                <p class="added_user">ユーザー登録が完了しました。</p>
                <p>早速ログインをしてみましょう。</p>
            </div>

            {{-- <p class="register_btn"><a href="/login">ログイン画面へ</a></p> --}}
            <div class="added_btn">{{ Form::submit('ログイン画面へ', ['class' => 'btn-primary_unfollow']) }}</div>
        </div>
    </div>
@endsection
