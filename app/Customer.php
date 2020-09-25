<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    public function bill(){
    	return $this->hasMany('App\Bill','customer_id','id');
    }
}
