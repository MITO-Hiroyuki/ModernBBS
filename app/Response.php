<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	protected $fillable = [
		'response_text',
		];
	
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	
	public function Comment()
	{
		return $this->belongsTo('App\Comment');
	}
}
