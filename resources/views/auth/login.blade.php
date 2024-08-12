@extends('layouts.logout')

@section('content')
    {{-- <div class="login_border"> --}}
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/login', 'class' => 'login-form']) !!}

    <p class="logout_intro">AtlasSNSへようこそ</p>
    <p>{{ Form::label('e-mail') }}</p>
    <p> {{ Form::text('mail', null, ['class' => 'input']) }}</p>
    <br>
    <p>{{ Form::label('password') }}</p>
    <p>{{ Form::password('password', ['class' => 'input']) }}</p>
    <br>
    {{ Form::submit('ログイン', ['class' => 'btn-primary_unfollow']) }}

    <p><a href="/register">新規ユーザーの方はこちら</a></p>
    {{-- </div> --}}


    {!! Form::close() !!}
@endsection
