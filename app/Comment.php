<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'comment_text',
		];
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	
	public function Thread()
	{
		return $this->hasMany('App\Thread');
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
