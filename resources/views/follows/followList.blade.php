@extends('layouts.login')

@section('content')
    <div class="wrapper">

        <div class="follow-list">
            <div class="follow_icon">
                <h2>フォローリスト</h2>
                {{-- <tr>
                <td></td> --}}
                @foreach ($follow_users as $followed)
                    <div class="follow-item">

                        <p>
                            <a href="/otherprofile/{{ $followed->id }}">
                                <img src=" {{ 'images/' . $followed->images }}" alt="ユーザーアイコン">
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
            @foreach ($follow_posts as $followed_post)
                <div class="follow-item">
                    <p>{{ $followed_post->user->username }}</p>
                    <p>{{ $followed_post->post }}</p>
                    <p>{{ $followed_post->created_at }}</p>
                    <p>
                        <a href="/otherprofile/{{ $followed->id }}">
                            <img src=" {{ 'images/' . $followed_post->user->images }}" alt="ユーザーアイコン">
                        </a>
                    </p>

                </div>
            @endforeach

        </div>
    </div>
@endsection
