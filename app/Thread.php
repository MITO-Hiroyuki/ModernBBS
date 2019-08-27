<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	public function Comment()
	{
		return $this->hasMany('App\Comment', 'thread_id');
	}
	
	public function Category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}
	
	public function Profile()
	{
		return $this->belongsTo('App\Profile', 'thread_profile_id');
	}
}
