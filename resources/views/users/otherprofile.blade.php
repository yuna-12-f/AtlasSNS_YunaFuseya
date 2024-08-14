@extends('layouts.login')

@section('content')
    <div class="wrapper">

        <div class="other-list">
            <div class="otherlist_container">
                {{-- <h2>他のユーザーのプロフィール</h2> --}}
                <div class="other_item">
                    <tr>
                        <td>
                            <img class="logo" src=" {{ asset('storage/user-images/' . $user->images) }}" alt="ユーザーアイコン">
                        </td>
                        <td>
                            <div class="other_form">
                                <div class="other_name">
                                    <p class="other_user">ユーザー名</p>
                                    <div class="other">{{ $user->username }}</div>
                                </div>
                                <div class="other_bio">
                                    <p class="other_intro">自己紹介</p>
                                    <div class="other">{{ $user->bio }}</div>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if (Auth::user()->isFollowing($user->id))
                                <!-- フォローボタン -->
                                <form action="/unfollow" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary_unfollow_other">フォロー解除する</button>
                                </form>
                            @else
                                <!-- フォローボタン -->
                                <form action="/follow" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary_follow_other">フォローする</button>
                                </form>
                            @endif
                        </td>
                    </tr>

                </div>
            </div>

            <div class="other-items-container">
                @foreach ($posts as $otherpost)
                    <div class="other-items">
                        <p>
                            <img class="logo other_icon"
                                src=" {{ asset('storage/user-images/' . $otherpost->user->images) }}" alt="ユーザーアイコン">
                        </p>
                        <div class="other_posts">
                            <p class="other_username">{{ $otherpost->user->username }}</p>
                            <p>{{ $otherpost->post }}</p>
                        </div>
                        <p>{{ $otherpost->created_at }}</p>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
