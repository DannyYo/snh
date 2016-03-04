<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    //
    protected  $fillable = [
        'weight',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
