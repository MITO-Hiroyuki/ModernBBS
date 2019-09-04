<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','t_s_filter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function Thread()
    {
        return $this->hasMany('App\Thread');
    }
    
    public function Comment()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function Response()
    {
        return $this->hasMany('App\Response');
    }
    
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'followed_user_id')
        ->using(Follow::class);
    }
}
