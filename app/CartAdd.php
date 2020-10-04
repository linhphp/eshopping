<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartAdd extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'cart_adds';

    protected $fillable = [
        'user_id'
    ]; 

    public function cartProduct()
    {
        return $this->belogsTo('App\CartProduct', 'cart_id', 'id');
    }

    public function userCart()
    {
        return $this->Hasmany('App\User', 'user_id', 'id');
    }
}
