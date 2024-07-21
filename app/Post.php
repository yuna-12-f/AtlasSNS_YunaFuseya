<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'post',
    ];

    public function user()
    {
        //リレーション（ポストから見てユーザーに繋げたい。1対多数）
        return $this->belongsTo('App\User');
    }
}
