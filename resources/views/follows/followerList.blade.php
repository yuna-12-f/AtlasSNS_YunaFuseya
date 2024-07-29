@extends('layouts.login')

@section('content')
    <div class="wrapper">
        <h2>フォロワーリスト</h2>
        <div class="follow-list">

            @foreach ($follow_users as $following)
                <div class="follow-item">
                    <p>
                        <a href="/otherprofile/{{ $following->id }}">
                            <img src=" {{ 'images/' . $following->images }}" alt="ユーザーアイコン">
                        </a>
                    </p>
                </div>
            @endforeach

            @foreach ($follow_posts as $following_post)
                <div class="follow-item">
                    <p>{{ $following_post->user->username }}</p>
                    <p>{{ $following_post->post }}</p>
                    <p>{{ $following_post->created_at }}</p>
                    <p> <a href="/otherprofile/{{ $following->id }}">
                            <img src=" {{ 'images/' . $following_post->user->images }}" alt="ユーザーアイコン">
                        </a>
                    </p>
                </div>
            @endforeach

        </div>
    </div>
@endsection
