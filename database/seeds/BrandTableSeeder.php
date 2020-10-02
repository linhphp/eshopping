<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand_products')->insert([
            'name'=>'MacBook',
        ]);
        DB::table('brand_products')->insert([
            'name'=>'Dell',
        ]);
        DB::table('brand_products')->insert([
            'name'=>'Asus',
        ]);
        DB::table('brand_products')->insert([
            'name'=>'Acer',
        ]);
        DB::table('brand_products')->insert([
            'name'=>'HP',
        ]);
    }
}
