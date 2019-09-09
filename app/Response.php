<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	protected $guarded = array('id');
	public static $rules = array(
		'response_text' => 'required',
		);
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function comment()
	{
		return $this->belongsTo('App\Comment', 'thread_id');
	}
	
	public function profile()
	{
		return $this->belongsTo('App\Profile', 'profile_id');
	}
}
