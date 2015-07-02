<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['user_id', 'sale_id', 'price', 'status']; 

 	public function user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function orderProducts(){
    	return $this->hasMany('App\orderProducts', 'order_id', 'id');
    }

    public function getStatus(){
    	if($this->status == 1){
    		return "Paid";
    	} else if($this->status == 2){
    		return "Not Paid";
    	} else if($this->status == 3){
    		return "Delivered";
    	}
    }

    public function getCountOfProducts(){
        return $this->orderProducts->count();
    }
}
