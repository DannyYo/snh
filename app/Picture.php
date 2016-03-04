<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected  $fillable = [
        'moment_id',
        'pic'
    ];
    public function moment()
    {
        return $this->belongsTo('App\Moment');  
    }
}
