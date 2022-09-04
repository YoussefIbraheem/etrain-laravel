<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Testomnial;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
   public function mainPage(){
      $testimonials = [];
    $data['courses'] = Course::select('*')->orderBy('id','asc')->take(3)->get();
    $data['testimonialCount'] = (Testomnial::count());
    for($i=0;$i<=(Testomnial::count()/2);$i++){
       $testimonials[]= Testomnial::select('*')->orderBy('id','desc')->offset($i*2)->take(2)->get();
    }
    
    $data['coursesCount'] = Course::count();
    $data['trainersCount'] = Trainer::count();
    $data['studentsCount'] = Student::count();
    $data['categoryCount'] = Category::count();
    return view('front.inc.index')->with($data)->with("testimonials",$testimonials);
   }
}
