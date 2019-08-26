<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $primaryKey = 'category_id';
	//protected $fillable = 'name';
	protected $dates = ['created_at','updated_at'];
	
}
