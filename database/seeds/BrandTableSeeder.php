<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\BrandProduct;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandProduct::create([
            "name"=>"SamSung",
        ]);
        BrandProduct::create([
            "name"=>"HP",
        ]);
        BrandProduct::create([
            "name"=>"Dell",
        ]);
        BrandProduct::create([
            "name"=>"Apple",
        ]);
    }
}
