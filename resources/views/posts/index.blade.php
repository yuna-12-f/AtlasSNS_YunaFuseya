@extends('layouts.login')

@section('content')
    <div class="wrapper">
        <div class="content_wrapper">
            <div class="content2">

                <form action="/newpostsend" method="post">
                    @csrf
                    <img src="{{ 'images/' . Auth::user()->images }}">
                    <input type="text" name="main" class="submit_text" placeholder="投稿内容を入力してください。">

                    <input type="submit" value="" class="submitbtn">

                </form>

            </div>
        </div>
    </div>
@endsection
