@extends('layouts.login')

@section('content')
    <div class="wrapper">
        <div class="content_wrapper">
            <div class="content2">
                <form class="new_post" action="/newpostsend" method="post">
                    @csrf
                    @if (Auth::user()->images == 'icon1.png')
                        {{-- icon1だったら --}}
                        {{-- icon1だった時の文 --}}
                        <img class="logo" src="{{ asset('images/' . Auth::user()->images) }}">
                    @else
                        {{-- icon1以外だった場合 --}}
                        <img class="logo" src="{{ asset('storage/user-images/' . Auth::user()->images) }}">
                    @endif

                    <input type="text" name="post" class="submit_text" placeholder="投稿内容を入力してください。">

                    <input type="submit" value="" class="submitbtn">

                    @foreach ($errors->all() as $error)
                        <li class="error_list_post">{{ $error }}</li>
                    @endforeach
                </form>

            </div>
        </div>
    </div>

    {{-- 削除 --}}{{-- 更新 --}}
    <table class="table table-hover">
        @foreach ($posts as $post)
            <tr class="newpost_line">
                <td class="post_usericon_container">

                    @if ($post->user->images == 'icon1.png')
                        <img class="logo" src=" {{ asset('images/' . $post->user->images) }}" alt="ユーザーアイコン">
                    @else
                        {{-- icon1以外だった場合 --}}
                        <img class="logo" src=" {{ asset('storage/user-images/' . $post->user->images) }}" alt="ユーザーアイコン">
                    @endif

                </td>
                <td class="posts">
                    <p class="post_username">{{ $post->user->username }}</p>
                    <p>{{ $post->post }}</p>
                </td>
                <td class="post_td">
                    <p class="post_date">{{ $post->created_at }}</p>
                    <div class="post_icon_container">
                        @if (Auth::check() && Auth::user()->id === $post->user_id)
                            <div class="post_icon">
                                <button class="modal__trigger" href="" post="{{ $post->post }}"
                                    post_id="{{ $post->id }}"><img class="logo_edit" src="./images/edit.png"
                                        alt="編集"></button>
                            </div>
                            <div class="post_icon">
                                <a class="btn btn-danger" href="/post/{{ $post->id }}/delete"
                                    onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                                    <img class="logo_trash delete-button" src="./images/trash.png" alt="削除">
                                </a>
                            </div>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- モーダル --}}



    <div class="modal">
        <div class="inner">
            <!-- モーダル本体 -->
            <div class="modal__wrapper">
                <div class="modal__layer"></div>
                <div class="modal__container">
                    <div class="modal__inner">

                        <!-- モーダルを閉じるボタン -->
                        {{-- <div class="modal__close"></div> --}}
                        <!-- / モーダルを閉じるボタン -->

                        <!-- モーダル内のコンテンツ -->
                        <div class="modal__content">
                            {{-- <p class="modal__title">モーダル１</p> --}}
                            <form action="/post/update" method="POST">
                                <textarea name="upPost" class="modal_post"></textarea>
                                <input type="hidden" name="id" class="modal_id">
                                {{-- <input type="submit" value="更新"><img src="./images/edit.png" alt="編集"> --}}
                                <div class="modal_error" style="display: none; color: red;"></div>
                                <input class="logo_edit" type="image" class="submit" src="./images/edit.png"
                                    alt="更新">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <!-- / モーダル内のコンテンツ -->

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
