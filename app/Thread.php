<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	protected $guarded = array('id');
	public static $rules = array(
		'thread_title' => 'required',
		'body' => 'required',
		);
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function comment()
	{
		return $this->hasMany('App\Comment', 'thread_id');
	}
	
	public function good()
	{
		return $this->hasMany('App\Good');
	}
	
	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}
	
	public function profile()
	{
		return $this->belongsTo('App\Profile', 'profile_id');
	}
	
	public function follows()
	{
		return $this->hasMany('App\Follow','followed_user_id','user_id');
	}
}
