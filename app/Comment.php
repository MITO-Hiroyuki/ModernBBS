<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['comment_text', 'user_id', 'thread_id', 'comment_profile_id'];
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	
	public function Thread()
	{
		return $this->belongsTo('App\Thread');
	}
	
	public function Response()
	{
		return $this->hasMany('App\Response');
	}
	
	public function Good()
	{
		return $this->hasMany('App\Good');
	}
	
	public function Good_by()
	{
		return Good::where('user_id', Auth::user()->id)->first();
	}
}
