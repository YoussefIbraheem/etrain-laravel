<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
    $faker= Factory::create();
    for ($i=1; $i <20 ; $i++) { 
        # code...
        Student::create([
            "name"=>$faker->name(),
            "email"=>$faker->email(),
            "phone"=>$faker->phoneNumber(),
            "spec"=>$faker->jobTitle()

        ]);
            
        }
    }
}
