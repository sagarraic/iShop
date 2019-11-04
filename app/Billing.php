<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
    	'total' , 
    ];

    public function orders() {
    	return $this->hasMany('App\Order');
    }
}
