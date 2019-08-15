<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Eloquent
{
	public function Comment()
	{
		return $this->hasMany('Comment', 'thread_id');
	}
	
	public function Category()
	{
		return $this->beLongsTo('Category', 'category_id');
	}
}
