<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected  $fillable = [
        'from',
        'to',
        'content'
    ];
    public function fromUser()
    {
        return $this->belongsTo('App\User','from');
    }
    public function toUser()
    {
        return $this->belongsTo('App\User','to');
    }
}
