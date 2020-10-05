<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kindOfNews extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'kind_of_news';

    protected $fillable = [
        'name',
    ];

    public function kindOfNews()
    {
        return $this->hasMany('App\News', 'kindOfNews_id', 'id');
    }
}
