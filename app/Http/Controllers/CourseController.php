<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Testomnial;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function mainPage(){
        $testimonials = [];
        $data['courses'] = Course::select('*')->orderBy('id','asc')->get();
        $data['testimonialCount'] = (Testomnial::count());
    for($i=0;$i<=(Testomnial::count()/2);$i++){
       $testimonials[]= Testomnial::select('*')->orderBy('id','desc')->offset($i*2)->take(2)->get();
    }
    return view('front.inc.course',["testimonials"=>$testimonials])->with($data);  
    }

public function category($id){
    $testimonials = [];
    $data['categories']= Category::select('*')->where('id',$id)->first();
    $data['courses'] = Course::select('*')->where('category_id',$id)->orderBy('id','asc')->take(3)->get();
    $data['testimonialCount'] = (Testomnial::count());
    for($i=0;$i<=(Testomnial::count()/2);$i++){
       $testimonials[]= Testomnial::select('*')->orderBy('id','desc')->offset($i*2)->take(2)->get();
    }
    return view('front.inc.course',["testimonials"=>$testimonials])->with($data);

}

public function singlePage($c_id){

    $data['course'] = Course::select('*')->where('category_id',$c_id)->first();
    return view('front.inc.courseDetails')->with($data);

}

}
