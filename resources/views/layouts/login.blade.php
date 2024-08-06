<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img class="atlasLogo" src="{{ asset('images/atlas.png') }}"></a></h1>
            <div class="accordion">
                <div class="accordion-container">
                    <div class="accordion-item">
                        <h3 class="accordion-title js-accordion-title">
                            <p>{{ Auth::user()->username }}さん</p>
                            <img class="logo" src="{{ asset('storage/user-images/' . Auth::user()->images) }}">
                        </h3>
                        <div class="accordion-content">
                            <ul class="menu">
                                <li><a class="home" href="/top">ホーム</a></li>
                                <li><a class="home" href="/profile">プロフィール</a></li>
                                <li><a class="home" href="/logout">ログアウト</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p class="side_username">{{ Auth::user()->username }}さんの</p>
                <div class="side_follow">
                    <p>フォロー数</p>
                    <p class="side_number_follow">{{ Auth::user()->followed->count() }}名</p>
                </div>
                <a class="button_side btn" href="/follow-list">フォローリスト</a>
                <div class="side_follow">
                    <p>フォロワー数</p>
                    <p class="side_number_follower">{{ Auth::user()->followings->count() }}名</p>
                </div>
                <a class="button_side btn" href="/follower-list">フォロワーリスト</a>
            </div>
            <p class="side_search">
                <a class="button_side_search btn " href="/search">ユーザー検索</a>
            </p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/JavaScript.js') }}"></script>
</body>

</html>
