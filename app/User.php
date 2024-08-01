<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        //リレーション（ユーザーから見てポストに繋げたい。多数対1）
        return $this->hasMany('App\Post');
    }

    //フォローしているユーザーを取得
    public function followed()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'following_id',
            'followed_id',
        );
    }

    //フォローされているユーザーを取得
    public function followings()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'followed_id',
            'following_id'
        );
    }

    // ユーザーをフォローしているかどうかを確認する
    public function isFollowing($userId)
    {
        return $this->followed()->where('followed_id', $userId)->exists();
    }

    // ユーザーをフォローしているかどうかを確認する
    public function isFollowed($userId)
    {
        return $this->followings()->where('following_id', $userId)->exists();
    }

    //フォローする
    public function follow($userId)
    {
        return $this->followed()->attach($userId);
    }

    //フォローを解除する
    public function unfollow($userId)
    {
        return $this->followed()->detach($userId);
    }
}
