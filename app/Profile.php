<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $filable = ['user_id', 'phone', 'facebook'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
