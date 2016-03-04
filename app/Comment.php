<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected  $fillable = [
        'user_id',
        'moment_id',
        'content'
    ];

    public function moment()
    {
        return $this->belongsTo('App\Moment');  
    }
    public function user()
    {
        return $this->belongsTo('App\User');  
    }

}
