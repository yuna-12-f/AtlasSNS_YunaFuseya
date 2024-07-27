@extends('layouts.login')

@section('content')
    <div class="wrapper">
        <div class="content_wrapper">
            <div class="content2">
                <form action="/newpostsend" method="post">
                    @csrf
                    <img src="{{ 'images/' . Auth::user()->images }}">
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
                <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img
                            src="./images/edit.png" alt="編集"></a></td>
                <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete"
                        onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="./images/trash.png" alt="削除"></a>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- モーダル --}}
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update" method="POST">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
@endsection
