@extends('layouts.login')

@section('content')
    <div class="wrapper">
        <div class="content_wrapper">
            <div class="content2">
                <form action="/newpostsend" method="post">
                    @csrf
                    <img src="{{ asset('storage/user-images/' . Auth::user()->images) }}">
                    <input type="text" name="post" class="submit_text" placeholder="投稿内容を入力してください。">

                    <input type="submit" value="" class="submitbtn">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </form>

            </div>
        </div>
    </div>

    {{-- 削除 --}}{{-- 更新 --}}
    <table class="table table-hover">
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->user->username }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                @if (Auth::check() && Auth::user()->id === $post->user_id)
                    <td><button class="modal__trigger" href="" post="{{ $post->post }}"
                            post_id="{{ $post->id }}"><img src="./images/edit.png" alt="編集"></button></td>
                    <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete"
                            onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="./images/trash.png"
                                alt="削除"></a>
                    </td>
                @endif
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
                        <div class="modal__close"></div>
                        <!-- / モーダルを閉じるボタン -->

                        <!-- モーダル内のコンテンツ -->
                        <div class="modal__content">
                            {{-- <p class="modal__title">モーダル１</p> --}}
                            <form action="/post/update" method="POST">
                                <textarea name="upPost" class="modal_post"></textarea>
                                <input type="hidden" name="id" class="modal_id">
                                {{-- <input type="submit" value="更新"><img src="./images/edit.png" alt="編集"> --}}
                                <input type="image" class="submit" src="./images/edit.png" alt="更新">
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
