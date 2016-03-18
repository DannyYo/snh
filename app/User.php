<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relaxtions\hasMany
	 */
	public function moments()
	{
	  return $this->hasMany('App\Moment');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function comments()
	{
	  return $this->hasMany('App\Comment');
	}


	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function weights()
	{
	  return $this->hasMany('App\Weight');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function letters()
	{
	  return $this->hasMany('App\Letter');
	}

	/**
	 * One to Many relation
	 * 收藏列表
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function keeps()
	{
	  return $this->hasMany('App\Keep');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function fans()
    {
      return $this->hasManyThrough('App\Follow', $this, 'id', 'follow_id');
    }
    public function follows()
    {
        return $this->belongsToMany('App\User','follows','user_id','follow_id');
    }
//    public function follows()
//    {
//        return $this->hasManyThrough('App\Follow', $this, 'id', 'user_id');
//    }
    public function to()
    {
        return $this->hasManyThrough('App\letter', $this, 'id', 'to');
    }
    public function from()
    {
        return $this->hasManyThrough('App\letter', $this, 'id', 'from');
    }
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    public function attendedActivities()
    {
        return $this->belongsToMany('App\Activity','user_activities');
    }
}
