<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $programmingLanguages=["PHP","JS","ASP","Python","C++","C#","Java","R","Kotlin","GO","TS"];
    public function run()
    {

        $profilePicsPath = public_path('front/img/author');
        $profilePics =  collect(scandir($profilePicsPath))->slice(2);
        $faker=Factory::create();
        
            for($j=0;$j<=count($this->programmingLanguages)-1;$j++){
            Course::create([
                "category_id"=>rand(1,7),
                "trainer_id"=>rand(1,5),
                "name"=>$this->programmingLanguages[$j],
                "brief_desc"=>$faker->text(50),
                "full_desc"=>$faker->paragraph(10),
                "image"=>($this->programmingLanguages[$j].".png"),
                "price"=>rand(1000,7000)
            ]);
            } 
        
    }
}
