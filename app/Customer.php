<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use SoftDeletes;
    
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
