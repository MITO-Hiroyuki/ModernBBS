<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Good;

class Comment extends Model
{
	protected $guarded = array('id');
	public static $rules = array(
		'comment_text' => 'required',
		);
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function response()
	{
		return $this->hasMany('App\Comment', 'response_id');
	}
	
	public function profile()
	{
		return $this->belongsTo('App\Profile', 'profile_id');
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
