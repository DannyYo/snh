<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    // group 和 keep都不用
    protected  $fillable = [
        'user_id',
        'content',
        'like',
        'keep'
    ];
    public function user()
    {
        // 如果你的父模型不使用id作为主键，或者你希望通过其他列来连接子模型，可以将自定义键名作为第三个参数传递给belongsTo方法：
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function keeps()
    {
        return $this->hasMany('App\Keep');
    }
    public function picture()
    {
        return $this->hasOne('App\Picture');
    }
}
