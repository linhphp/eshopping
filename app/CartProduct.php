<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartProduct extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'cart_products';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function ProductCart()
    {
    	return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function cartAdd()
    {
    	return $this->belogsTo('App\CartAdd', 'cart_id', 'id');
    }
}
