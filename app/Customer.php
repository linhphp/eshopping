<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
    ];

    public function bill()
    {
    	return $this->hasMany('App\Bill','customer_id','id');
    }
}
