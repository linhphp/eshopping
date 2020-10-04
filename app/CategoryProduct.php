<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    //
    use SoftDeletes;

    protected $table = 'category_products';

    protected $fillable = [
       'id',
       'name',
       'desc',
    ];

    public function product_ct()
    {
    	return $this->hasMany('App\Product','cate_id','id');
    }
}
