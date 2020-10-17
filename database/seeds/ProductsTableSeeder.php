<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "cate_id"=>1,
            "brand_id"=>1,
            "name"=>"Samsung123",
            "unit_price"=>20000000,
            "promotion_price"=>20000000*0.1,
            "image"=>"ip11.png",
            "desc"=>"hàng mới về",
            "content"=>"hàng mới về",
            "status"=>1,
            "quantity"=>2,
        ]);
    }
}
