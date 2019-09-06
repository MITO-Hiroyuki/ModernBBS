<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	protected $fillable = [
		'response_text',
		];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function comment()
	{
		return $this->belongsTo('App\Comment');
	}
}
