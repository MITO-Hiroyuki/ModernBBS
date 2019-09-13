<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\User;

class Follow extends Pivot 
{
    protected $table = 'follows';
    public $timestamps = false;
    protected $guarded = [];
    
    public function FollowUsers(){
        return $this->belongsTo('App\User','followed_user_id');
    }
    
    public function threads(){
        return $this->hasMany('App\Thread','user_id','followed_user_id');
    }
}
