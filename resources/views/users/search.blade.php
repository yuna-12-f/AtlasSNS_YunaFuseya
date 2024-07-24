@extends('layouts.login')

@section('content')
    <form action="/search" method="get">
        @csrf
        <input type="text" name="keyword" value="" class="search-form" placeholder="ユーザー名">
        <button type="submit" value="" class="btn-success"></button>
    </form>

    <div class="container-list">
        <table class="table table-hover">
            @foreach ($users as $user)
                @if ($user->id !== Auth::user()->id)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td><img src=" {{ 'images/' . $user->images }}" alt="ユーザーアイコン"></td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
