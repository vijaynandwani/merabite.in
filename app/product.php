<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['category_id', 'title', 'description', 'price', 'availability', 'image'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function orderProducts(){
    	return $this->belongsToMany('App\OrderProducts');
    }
}
