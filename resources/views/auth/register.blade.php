@extends('layouts.logout')

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/register', 'class' => 'login-form']) !!}

    <div class="login_border">

        <h2 class="logout_intro">新規ユーザー登録</h2>
        <p class="register_label">{{ Form::label('ユーザー名') }}</p>
        <div>{{ Form::text('username', null, ['class' => 'input']) }}</div>

        <p class="register_label">{{ Form::label('メールアドレス') }}</p>
        <div>{{ Form::text('mail', null, ['class' => 'input']) }}</div>

        <p class="register_label">{{ Form::label('パスワード') }}</p>
        <div>{{ Form::password('password', ['class' => 'input']) }}</div>

        <p class="register_label">{{ Form::label('パスワード確認') }}</p>
        <div>{{ Form::password('password_confirmation', ['class' => 'input']) }}</div>

        <div class="register_btn">{{ Form::submit('新規登録', ['class' => 'btn-primary_unfollow']) }}</div>

        <p><a href="/login" class="logout_url">ログイン画面へ戻る</a></p>

    </div>

    {!! Form::close() !!}
@endsection
