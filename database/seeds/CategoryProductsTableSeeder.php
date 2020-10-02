<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_products')->insert([
            'name'=>'Điện thoại',
        ]);
        DB::table('category_products')->insert([
            'name'=>'Laptop',
        ]);
        DB::table('category_products')->insert([
            'name'=>'Tai nghe',
        ]);
        DB::table('category_products')->insert([
            'name'=>'Chuột máy tính',
        ]);
    }
}
