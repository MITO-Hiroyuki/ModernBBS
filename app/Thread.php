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
		return $this->hasMany('Comment', 'thread_id');
	}
	
	public function Category()
	{
		return $this->belongsTo('Category', 'category_id');
	}
	
	public function Profile()
	{
		return $this->belongsTo('Profile', 'thread_profile_id');
	}
}
