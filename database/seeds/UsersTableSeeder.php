<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=> hash::make('123456'),
        ]);
        for($i=0;$i<5;$i++){
            DB::table('users')->insert([
                'name'=> $faker->name(),
                'email'=> $faker->safeEmail(),
                'password'=> hash::make('123456'),
            ]);
        }
    }
   
}
