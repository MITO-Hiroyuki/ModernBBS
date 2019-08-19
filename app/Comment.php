<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Eloquent
{
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
}
