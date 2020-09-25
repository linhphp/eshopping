<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public function category_product(){
    	return $this->belongsTo('App\CategoryProduct','cate_id','id');
    }
    public function brand_product(){
    	return $this->belongsTo('App\BrandProduct','brand_id','id');
    }
}
