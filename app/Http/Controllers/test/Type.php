<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //

    public function users()
    {
        return $this->belongsToMany('App\User','user_type');  //return $this->belongsToMany('App\Article','conversation_id'); //如果外键不是主键关联
    }
}
