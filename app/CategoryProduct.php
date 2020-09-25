<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $table = 'category_products';
    protected $fillable = [
       'id', 'name', 'desc',
    ];
    public function product_ct()
    {
    	return $this->hasMany('App\Product','cate_id','id');
    }
    public function product()
    {
       
    }
}
