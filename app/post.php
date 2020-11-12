<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function user(){

    	return $this->belongsTo('App\User');
    }


    public function category(){


    	return $this->belongsTo('App\category');
    }

    public function images(){

    	return $this->hasMany('App\image');
    }


}
