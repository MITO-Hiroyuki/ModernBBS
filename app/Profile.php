<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
            'hobby' => 'required',
            'gender' => 'required',
            'introduction' => 'required',
        );
    
   public function User(){
       return $this->belongsTo('App\User');
   }
}
