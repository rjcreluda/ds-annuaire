<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'listing_id', 'url'
    ];
    
    public function listing(){ 
        return $this->belongsTo('App\Listing');
    }

    public function getUrl(){
        return '/uploads/' . $this->url;
    }
}
