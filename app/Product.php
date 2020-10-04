<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'cate_id',
        'brand_id',
        'name',
        'unit_price',
        'promotion_price',
        'image',
        'desc',
        'content',
        'status',
        'quantity',
    ];

    public function category_product(){
    	return $this->belongsTo('App\CategoryProduct','cate_id','id');
    }

    public function brand_product(){
    	return $this->belongsTo('App\BrandProduct','brand_id','id');
    }
}
