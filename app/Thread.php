<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	protected $fillable = [
		'thread_title',
		'body'
		];
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	public function Comment()
	{
		return $this->hasMany('App\Comment');
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
