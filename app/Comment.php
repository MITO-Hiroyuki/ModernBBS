<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'comment_text',
		];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function thread()
	{
		return $this->hasMany('App\Thread');
	}
	
	public function response()
	{
		return $this->hasMany('App\Response');
	}
	
	public function good()
	{
		return $this->hasMany('App\Good');
	}
	
	public function good_by()
	{
		return Good::where('user_id', Auth::user()->id)->first();
	}
}
