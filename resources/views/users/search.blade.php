@extends('layouts.login')

@section('content')
    <form action="/search" method="get">
        @csrf
        <input type="text" name="keyword" value="" class="search-form" placeholder="ユーザー名">
        <button type="submit" value="" class="btn-success"></button>
    </form>

    @if (!empty($keyword))
        <p class="return_empty">
            <i class="fa fa-angle-double-left">検索ワード: {{ $keyword }}</i>
            </a>
        </p>
    @endif

    <div class="container-list">
        <table class="table table-hover">
            @foreach ($users as $user)
                @if ($user->id !== Auth::user()->id)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td><img src=" {{ 'images/' . $user->images }}" alt="ユーザーアイコン"></td>

                        <td>
                            @if (Auth::user()->isFollowing($user->id))
                                <!-- アンフォローボタン -->
                                <form action="/unfollow" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary">フォロー解除する</button>
                                </form>
                            @else
                                <!-- フォローボタン -->
                                <form action="/follow" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary">フォローする</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
