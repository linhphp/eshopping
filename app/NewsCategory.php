<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NewsCategory extends Model
{
    //
    use SoftDeletes;
    
    protected $table ='news_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function news(){
    	return $this->hasMany('App\News','newsCategory_id','id');
    }
}
