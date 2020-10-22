<?php

use Illuminate\Database\Seeder;
use App\NewsCategory;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<5;$i++){
            $name =$faker->text(rand(10,15));
            $slug = $faker->slug(20);
            NewsCategory::create([
                "name" => $name,
                "slug" => $slug,
            ]);

        }
    }
}
