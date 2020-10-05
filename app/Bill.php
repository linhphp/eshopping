<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    //
    use SoftDeletes;
    
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
