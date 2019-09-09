<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;
use App\Category;

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
		return $this->belongsTo('App\Comment', 'response_id');
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
