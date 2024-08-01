@extends('layouts.login')

@section('content')
    <div class="wrapper">
        <h2>他のユーザーのプロフィール</h2>
        <div class="other-list">

            <div class="follow-item">
                <tr>
                    <td>
                        <img src=" {{ asset('images/' . $user->images) }}" alt="ユーザーアイコン">
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->bio }}</td>

                    <td>

                        @if (Auth::user()->isFollowing($user->id))
                            <!-- フォローボタン -->
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

            </div>

            @foreach ($posts as $otherpost)
                <div class="follow-item">
                    <p>{{ $otherpost->user->username }}</p>
                    <p>{{ $otherpost->post }}</p>
                    <p>{{ $otherpost->created_at }}</p>
                    <p>
                        <img src=" {{ asset('images/' . $otherpost->user->images) }}" alt="ユーザーアイコン">
                    </p>
                </div>
            @endforeach

        </div>
    </div>
@endsection
