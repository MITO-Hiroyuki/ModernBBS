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
    
    public function thread()
    {
        return $this->belogsTo('App\Thread');
    }
    
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
    
    public function good()
    {
        return $this->hasMany(Good::class);
    }
    
    public function response()
    {
        return $this->belongsTo('App\Response');
    }
    
    public function profile(){
       return $this->belongsTo('App\Profile');
   }
    
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'followed_user_id')
        ->using(Follow::class);
    }
}
