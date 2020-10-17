<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
    'slide_name', 'slide_image','slide_desc'
     ];
}
