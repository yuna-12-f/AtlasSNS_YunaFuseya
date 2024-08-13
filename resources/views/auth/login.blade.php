@extends('layouts.logout')

@section('content')
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/login', 'class' => 'login-form']) !!}

    <div class="login_border">
        <p class="logout_intro">AtlasSNSへようこそ</p>
        <p class="label">{{ Form::label('メールアドレス') }}</p>
        <p> {{ Form::text('mail', null, ['class' => 'input']) }}</p>
        <br>
        <p class="label">{{ Form::label('パスワード') }}</p>
        <div>{{ Form::password('password', ['class' => 'input']) }}</div>
        <br>
        <div class="btn">{{ Form::submit('ログイン', ['class' => 'btn-primary_unfollow']) }}</div>

        <p><a href="/register" class="logout_url">新規ユーザーの方はこちら</a></p>
    </div>


    {!! Form::close() !!}
@endsection
