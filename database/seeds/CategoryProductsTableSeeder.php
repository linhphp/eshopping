<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\CategoryProduct;

class CategoryProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryProduct::create([
            "name"=>"Điện thoại",
        ]);
        CategoryProduct::create([
            "name"=>"Laptop",
        ]);
        CategoryProduct::create([
            "name"=>"Tai nghe",
        ]);
        CategoryProduct::create([
            "name"=>"Chuột máy tính",
        ]);
    }
}
