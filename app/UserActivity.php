<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected  $fillable = [
        'user_id',
        'activity_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id', 'id');
    }

}
