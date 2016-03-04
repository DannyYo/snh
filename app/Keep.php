<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keep extends Model
{
    protected  $fillable = [
        'user_id',
        'moment_id',
        'content'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');  
    }

    public function moment()
    {
        return $this->belongsTo('App\Moment');
    }

}
