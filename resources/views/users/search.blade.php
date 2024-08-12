@extends('layouts.login')

@section('content')
    <form class="search_box" action="/search" method="get">
        @csrf
        <input type="text" name="keyword" value="" class="search_form" placeholder="ユーザー名">
        <button type="submit" value="" class="btn-success"></button>


        @if (!empty($keyword))
            <p class="return_empty">
                <i class="fa fa-angle-double-left">検索ワード: {{ $keyword }}</i>
                </a>
            </p>
        @endif

    </form>

    <div class="container-list">
        <table class="table table-hover">
            @foreach ($users as $user)
                @if ($user->id !== Auth::user()->id)
                    <tr class="search_line">
                        <td class="search_usericon_container"><img class="search_icon"
                                src=" {{ asset('storage/user-images/' . $user->images) }}" alt="ユーザーアイコン"></td>
                        <td class="search_username">
                            <p class="search_username_line">{{ $user->username }}</p>
                        </td>
                        <td class="follow_unfollow_btn">
                            @if (Auth::user()->isFollowing($user->id))
                                <!-- アンフォローボタン -->
                                <form action="/unfollow" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary_unfollow">フォロー解除する</button>
                                </form>
                            @else
                                <!-- フォローボタン -->
                                <form action="/follow" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary_follow">フォローする</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
