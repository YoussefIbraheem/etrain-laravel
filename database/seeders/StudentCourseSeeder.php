<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=1; $i <15 ; $i++) { 
            # code...
            DB::table('courses_students')->insert(
                [
                    "course_id"=>rand(1,11),
                    "student_id"=>rand(1,20),
                    "status"=>$faker->randomElement(['pending','approved','rejected'])
    
    
                ]
                );
        }
    }
}
