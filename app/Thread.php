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
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	public function Comment()
	{
		return $this->belongsTo('App\Comment', 'thread_id');
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
