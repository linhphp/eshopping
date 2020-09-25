<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    //
    protected $table = 'brand_products';
    protected $fillable = [
        'name', 'desc',
    ];
    public function product_br(){
    	return $this->hasMany('App\Product','brand_id','id');
    }
}
