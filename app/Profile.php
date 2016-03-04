<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected  $fillable = [
        'username',
        'sex',
        'location',
        'intro',
        'avatar',
        'style',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
