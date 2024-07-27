<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::group(['middleware' => 'auth'], function () {

    //ログアウト機能
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('/logout', 'Auth\LoginController@logout');

    //ログイン中のページ
    Route::get('/top', 'PostsController@index');
    Route::post('/top', 'PostsController@index');

    Route::get('/profile', 'UsersController@profile');

    //プロフィール編集画面
    Route::post('/profile/update', 'UsersController@updateProfile');

    Route::get('/search', 'UsersController@search');

    Route::get('/follow-list', 'PostsController@index');
    Route::get('/follower-list', 'PostsController@index');

    //新規投稿作成
    Route::post('/newpostsend', 'PostsController@newPostCreate');

    //投稿の削除
    Route::get('/post/{id}/delete', 'PostsController@delete');

    //投稿の編集
    Route::post('/post/update', 'PostsController@postUpdate');

    //フォローする
    Route::post('/follow', 'FollowsController@follow');

    //フォロー解除する
    Route::post('/unfollow', 'FollowsController@unfollow');
});
