<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // group 和 keep都不用
    protected  $fillable = [
        'user_id',
        'title',
        'content',
        'start',
        'end',
        'loc'
    ];
    public function user()
    {
        // 如果你的父模型不使用id作为主键，或者你希望通过其他列来连接子模型，可以将自定义键名作为第三个参数传递给belongsTo方法：
        return $this->belongsTo('App\User');
    }

    public function attendees()
    {
        return $this->belongsToMany('App\User','user_activities');
    }
}
