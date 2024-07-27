<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Follow extends Model
{


    // マスアサインメントを許可する属性
    protected $fillable = [
        'following_id',  // ここに 'following_id' を追加
        'followed_id',   // 既存の場合、これもリストに追加
    ];


    public function user()
    {
        return $this->hasMany('App\User');
    }
    public $timestamps = false;

    //フォローされているユーザーを取得
    public function followers()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'followed_id',
            'following_id'
        );
    }

    //フォローしているユーザーを取得
    public function followings()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'followed_id',
            'following_id'
        );
    }

    //フォローする
    public function follow(User $user)
    {
        return $this->followings()->attach($user->id);
    }

    //フォローを解除する
    public function unfollow(User $user)
    {
        return $this->followings()->where('following_id', $user->id)->exists();
    }
}
