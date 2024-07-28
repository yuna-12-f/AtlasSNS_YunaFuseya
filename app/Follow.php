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
}
