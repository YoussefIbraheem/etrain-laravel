<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Category;
use App\Models\Testomnial;
use App\Mail\EnrollConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

public function showCourse($id){

    $data['course'] = Course::select('*')->where('id',$id)->first();
    return view('front.inc.courseDetails')->with($data);

}


public function enroll(Request $request){

    $data = $request->validate([
        'name'=>'required|string|max:191',
        'email'=>'required|email|max:191',
        'phone'=>'required|max:191',
        'spec'=>'required|string|max:191',
        'course_id'=>'required|exists:courses,id'
    ]);

    $student = Student::create($data);
    $student_id = $student->id;

    DB::table('courses_students')->insert([
        'course_id'=>$data['course_id'],
        'student_id'=> $student_id,
        'created_at'=> now(),
        'updated_at'=>now()
    ]);

    Mail::to($data['email'])->send(new EnrollConfirm($data));

    return redirect()->back();

}

}
