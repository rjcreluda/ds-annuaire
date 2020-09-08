<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'description', 'address', 'email', 'website', 'phone', 'status'
    ];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
