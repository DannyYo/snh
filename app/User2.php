<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class User extends Model
{
    //
     protected  $fillable = [
         'account',
         'password',
         'lock',
         'registime',
     ];
    protected $dates = ['registime']; //使registime作为Carbon对象来处理：

    public function setRegistimeAttribute($date)
    {
        $this->attributes['registime'] = Carbon::createFromFormat('Y-m-d',$date);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
        //仅仅是举例
    }

    public function scopeRegisted($query)
    {
        $query->where('registime','<=',Carbon::now());
    }

    public function types()
    {
        return $this->belongsToMany('App\Type','user_type')->withTimestamps();
    }

    public function getTypeListAttribute()
    {
        // laravel 5.1 needs all()
        return $this->types->lists('id')->all();
        // tags means tags() many-to-many relationship with tag

        //laravel 5.0版本，写成这样return $this->tags->lists('id');
    }
}
