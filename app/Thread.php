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
		return $this->hasMany('App\User');
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
		return $this->hasMany('App\Profile');
	}
}
