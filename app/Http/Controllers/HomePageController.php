<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Message;
use App\Models\Student;
use App\Models\Trainer;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Testomnial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
   public function mainPage(){
      $testimonials = [];
    $data['courses'] = Course::select('*')->orderBy('id','asc')->take(3)->get();
    $data['testimonialCount'] = (Testomnial::count());
    for($i=0;$i<=(Testomnial::count()/2);$i++){
       $testimonials[]= Testomnial::select('*')->orderBy('id','desc')->offset($i*2)->take(2)->get();
    }
    $data['banner'] = Content::where('name','banner')->first();
    $data['coursesCount'] = Course::count();
    $data['trainersCount'] = Trainer::count();
    $data['studentsCount'] = Student::count();
    $data['categoryCount'] = Category::count();
    return view('front.inc.index')->with($data)->with("testimonials",$testimonials);
   }

  
   public function newsletter(Request $request){
      $data = $request->validate(['newsletterEmail'=>'required|email|unique:newsletters,email']);
      Newsletter::create(['email'=>$request->newsletterEmail]);
      session()->flash('success',"email added successfully!! You will receive updates on our new courses and offers! ");
      return redirect()->back();
   }

   public function showAbout(){
      return view('front.inc.about');
   }

   public function showContacts(){
      $contactInfo = Contact::first();
      return view('front.inc.contact')->with(['contactInfo'=>$contactInfo]);
   }

   public function showBlog(){
      return view('front.inc.blog');
   }


   public function sendEmail(Request $request){
$data = $request->validate([
  'name'=>'required',
  'email'=>'required|email',
  'subject'=>'required',
  'message'=>'required'
]);
  Mail::to('jo.mohsen2@gmail.com')->send(new ContactUs($data));
  Message::create($data);
  session()->flash('success',"email added successfully!! You will receive updates on our new courses and offers! ");
  return redirect()->back();
  


   }
 
}
