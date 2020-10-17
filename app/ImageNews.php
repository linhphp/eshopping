<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageNews extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'image_news';

    protected $fillable = [
    	'news_id',
        'image',
    ];

    public function newsImage()
    {
        return $this->belongsTo('App\New', 'news_id', 'id');
    }
}
