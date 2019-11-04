<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'quantity' , 'total', 'billing_id' ,'country' , 'state' , 'zip' ,'ship_date' , 'status' 
    ];

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function billing(){
    	return $this->belongsTo('App\billing');
    }
}
