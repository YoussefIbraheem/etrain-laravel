<?php

namespace Database\Seeders;

use App\Models\Testomnial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Factory\faker;
use Faker\Factory;

class TestmonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imgPath = public_path("front/img/testimonial");
        $imgs = collect(scandir($imgPath))->slice(2);
        $faker = Factory::create();
        // for($i=1;$i<=5;$i++){
            Testomnial::create([
                "name"=>$faker->name(),
                "spec"=>$faker->jobTitle(),
                "desc"=>$faker->sentence(),
                "image"=>$faker->randomElement($imgs)
            ]);
        // }
        
    }
}
