<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Follow extends Pivot 
{
    protected $table = 'follows';
    public $timestamps = false;
    protected $guarded = [];
}
