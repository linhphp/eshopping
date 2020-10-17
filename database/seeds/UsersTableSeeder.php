<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

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
        User::create([
            "name"=>"admin",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt('123456')
            
        ]);
        for($i=0;$i<5;$i++){
        $name =$faker->firstName();
        $email =$faker->email(15);
            User::create([
                "name"=>$name,
                "email"=>$email,
                "password"=>bcrypt('123456')
            ]);         
        }    
    }
}
