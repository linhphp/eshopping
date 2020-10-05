<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageProduct extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'image_products';

    protected $fillable = [
        'product_id',
        'news_id',

    ];

    public function imageProduct()
    {
    	return $this->belogsTo('App\Product', 'product_id', 'id');
    }
}
