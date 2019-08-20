<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	
	public function Comment()
	{
		return $this->belongsTo('App\Comment');
	}
}
