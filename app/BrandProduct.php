<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandProduct extends Model
{
    //
    use SoftDeletes;

    protected $table = 'brand_products';

    protected $fillable = [
        'name',
    ];
    public function product_br()
    {
    	return $this->hasMany('App\Product','brand_id','id');
    }
}
