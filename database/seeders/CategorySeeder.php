<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $categories=['Front-End Web','Back-End Web','Full-Stack Web','Front-End App','Back-End App','Full-Stack App',' AI & Machine Learning','Programming Fundamentals'];
    public function run()
    {
        $faker=Factory::create();
        
        for($i=0;$i<=7;$i++){
            Category::create([
                "name"=>$this->categories[$i]
            ]);
        }
        
    }
}
