@extends('layouts.login')

@section('content')
    <div class="wrapper">

        <div class="follow-list">
            <div class="follow_container">
                <p class="follow_icon">
                <h2 class="follow_list">フォローリスト</h2>
                </p>
                <div class="follow_icon">
                    @foreach ($follow_users as $followed)
                        <div class="follow_item">
                            <p>
                                <a href="/otherprofile/{{ $followed->id }}">

                                    @if ($followed->images == 'icon1.png')
                                        {{-- icon1だったら --}}
                                        {{-- icon1だった時の文 --}}
                                        <img class="logo" src=" {{ asset('images/' . $followed->images) }}" alt="ユーザーアイコン">
                                    @else
                                        {{-- icon1以外だった場合 --}}
                                        <img class="logo" src=" {{ asset('storage/user-images/' . $followed->images) }}"
                                            alt="ユーザーアイコン">
                                    @endif

                                </a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <table class="table table-hover">
                @foreach ($follow_posts as $followed_post)
                    <tr class="followpost_line">
                        <td class="follow_usericon_container">
                            <a href="/otherprofile/{{ $followed_post->user->id }}">

                                @if ($followed_post->user->images == 'icon1.png')
                                    {{-- icon1だったら --}}
                                    {{-- icon1だった時の文 --}}
                                    <img class="logo" src=" {{ asset('images/' . $followed_post->user->images) }}"
                                        alt="ユーザーアイコン">
                                @else
                                    {{-- icon1以外だった場合 --}}
                                    <img class="logo"
                                        src=" {{ asset('storage/user-images/' . $followed_post->user->images) }}"
                                        alt="ユーザーアイコン">
                                @endif



                            </a>
                        </td>
                        <td class="follow_posts">
                            <p class="followpost_username">{{ $followed_post->user->username }}</p>
                            <p>{{ $followed_post->post }}</p>
                        </td>
                        <td class="followpost_td">
                            <p class="followpost_date">{{ $followed_post->created_at }}</p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
