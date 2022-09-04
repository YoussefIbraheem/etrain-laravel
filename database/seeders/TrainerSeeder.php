<?php

namespace Database\Seeders;
use File;
use Faker\Factory;
use App\Models\Trainer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run()
    {
        $profilePicsPath = public_path('front/img/author');
        $profilePics =  collect(scandir($profilePicsPath))->slice(2);
        $faker=Factory::create();
        for ($i=1; $i <= 5 ; $i++) { 
            # code...
            Trainer::create([
                "name"=>$faker->name($gender = null),
                "phone"=>$faker->phoneNumber(),
                "spec"=>$faker->jobTitle(),
                "email"=>$faker->email(),
                "profile_pic"=> $faker->randomElement($profilePics)
            ]);
        }
        
    }
}
