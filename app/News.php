<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'news';

    protected $fillable = [
         'newsCategory_id',
         'kindOfNews_id',
         'title',
         'slug',
         'source',
         'desc',
         'content',
    ];

    public function newCategory(){
    	return $this->belongsTo('App\NewsCategory','newsCategory_id','id');
    }

    public function kindOfNews(){
    	return $this->belongsTo('App\KindOfNews','kindOfNews_id','id');
    }
}
