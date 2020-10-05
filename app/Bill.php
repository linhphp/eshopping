<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    
    protected $table = 'bills';

    protected $fillable = [
        'customer_id',
        'payment',
        'total_price',
        'note',
        'status',
    ];

    public function billDetail()
    {
    	return $this->hasMany('App\BillDetail','bill_id','id');
    }
    public function customerBill()
    {
    	return $this->belongsTo('App\Customer','customer_id','id');
    }
}
