@extends('layouts.login')

@section('content')
    <div class="wrapper">

        <div class="follow-list">
            <div class="follow_container">
                <p class="follow_icon">
                <h2 class="follow_list">フォロワーリスト</h2>
                </p>
                <div class="follow_icon">
                    @foreach ($follow_users as $following)
                        <div class="follow-item">
                            <p>
                                <a href="/otherprofile/{{ $following->id }}">
                                    <img class="logo" src=" {{ asset('storage/user-images/' . $following->images) }}"
                                        alt="ユーザーアイコン">
                                </a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <table class="table table-hover">
                @foreach ($follow_posts as $following_post)
                    <tr class="followpost_line">
                        <td class="follow_usericon_container">
                            <a href="/otherprofile/{{ $following->id }}">
                                <img class="logo"
                                    src=" {{ asset('storage/user-images/' . $following_post->user->images) }}"
                                    alt="ユーザーアイコン">
                            </a>
                        </td>
                        <td class="follow_posts">
                            <p class="followpost_username">{{ $following_post->user->username }}</p>
                            <p>{{ $following_post->post }}</p>
                        </td>
                        <td class="followpost_td">
                            <p class="followpost_date">{{ $following_post->created_at }}</p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
