<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderProducts extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity' ,'price']; 

 	public function Order(){
    	return $this->belongsTo('App\order');
    }

    public function Product(){
    	return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
