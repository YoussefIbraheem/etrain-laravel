<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Message;
use App\Models\Student;
use App\Models\Trainer;
use App\Models\Category;
use App\Mail\ResponseMail;
use App\Mail\statusEmail;
use App\Models\Testomnial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // MAIN FUNCTIONS
    public function index(){
        return view('admin.inc.index');
    }


    public function login(){
        if(Auth::guard('admin')->check()){
          return redirect(url('dashboard/'));
        }else{
            return view('admin.inc.login');
        }
    }


    public function signIn( Request $request){
        $data = $request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
            
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect(route('front.admin.index'));
        }else{
            return redirect()->back()->withErrors('email or password is incorrect');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('front.inc.index'));
    }

    //Categories functions
    public function showCategories(){
        $categories = Category::all();
        return view('admin.inc.categories',compact('categories'));
    }

    public function addCategory(Request $request){
        $data = $request->validate(['name'=>'required|string|max:121']);
        Category::create($data);
        session()->flash('success',"Category Added Successfully");
        return redirect()->back();
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('success',"Category Deleted Successfully");
        return redirect()->back();
    }

    public function updateCategory(Request $request,$id){
        $data = $request->validate(['nameEdit'=>'required|string|max:121']);
        $category = Category::findOrFail($id);
        $category->update(['name'=>$data['nameEdit']]);
        session()->flash('success',"Category Updated Successfully");
        return redirect()->back();
    }

    //Trainers functions
    public function showTrainers(){
        $trainers = Trainer::all();
        return view('admin.inc.trainers',compact('trainers'));
    }

    public function addTrainer(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:121',
            'email'=>'required|string|max:121',
            'phone'=>'required|string|max:121',
            'spec'=>'required|string|max:121',
            'profile_pic'=>'required|image|mimes:jpg,png,jpeg',
        ]);
        $newImgName = $data['profile_pic']->hashName();
        Image::make($data['profile_pic'])->resize(1024,512)->save(public_path('storage/img/author/'.$newImgName));
        $data['profile_pic'] = $newImgName;
        Trainer::create(
            [
                'name'=>$data['name'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'spec'=>$data['spec'],
                'profile_pic'=>$data['profile_pic'],
                
            ]
        );
        session()->flash('success',"Trainer Added Successfully");
        return redirect()->back();
    }

    public function deleteTrainer($id){
        $category = Trainer::findOrFail($id);
        $category->delete();
        session()->flash('success',"Trainer Deleted Successfully");
        return redirect()->back();
    }

    public function updateTrainer(Request $request,$id){
        $data = $request->validate(
            [
                'nameEdit'=>'required|string|max:121',
                'phoneEdit'=>'required|string|max:121',
                'emailEdit'=>'required|string|max:121|email',
                'specEdit'=>'required|string|max:121',
                'picEdit'=>'image|mimes:jpg,png,jpeg',
            ]);
        $trainer = Trainer::findOrFail($id);
        if($request->has('picEdit')){
            Storage::delete('img/author/'.$trainer->profile_pic);
            $newImgName = $data['picEdit']->hashName();
            Image::make($data['picEdit'])->resize(1024,512)->save(public_path('storage/img/author/'.$newImgName));
            $data['picEdit'] = $newImgName;
        }else{
            $data['picEdit'] = $trainer->profile_pic;
        }
        $trainer->update([
            'name'=>$data['nameEdit'],
            'phone'=>$data['phoneEdit'],
            'email'=>$data['emailEdit'],
            'spec'=>$data['specEdit'],
            'profile_pic'=>$data['picEdit']
            
    ]);
    session()->flash('success',"Trainer Updated Successfully");
        return redirect()->back();
    }

    //Courses functions

    public function showCourses(){
        $courses = Course::all();

        foreach ( $courses as  $course) {
            $appliedStudents = Course::join('courses_students','courses.id','=','courses_students.course_id')->where('courses_students.course_id','=',$course->id)->count();
            // $course->update(['number_of_students'=>($course->number_of_students - $appliedStudents)]);
        }
        return view('admin.inc.courses',compact('courses'));
    }

    public function addCourse(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:121',
            'price'=>'required|string|max:121',
            'number_of_students'=>'required|numeric|max:15',
            'category'=>'required|string|max:121|exists:categories,id',
            'trainer'=>'required|string|max:121|exists:trainers,id',
            'brief_desc'=>'required|string|max:121',
            'full_desc'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jpeg',
        ]);
        $newImgName = $data['image']->hashName();
        Image::make($data['image'])->resize(1024,512)->save(public_path('storage/img/special_cource/'.$newImgName));
        $data['image'] = $newImgName;
        Course::create(
            [
                'name'=>$data['name'],
                'price'=>$data['price'],
                'category_id'=>$data['category'],
                'trainer_id'=>$data['trainer'],
                'brief_desc'=>$data['brief_desc'],
                'full_desc'=>$data['full_desc'],
                'image'=>$data['image'],
                'number_of_students'=>$data['number_of_students'],
                
            ]
        );
        session()->flash('success',"Course Added Successfully");
        return redirect()->back();
    }

    public function deleteCourse($id){
        $course = Course::findOrFail($id);
        $course->delete();
        session()->flash('success',"Course Deleted Successfully");
        return redirect()->back();
    }

    public function updateCourse(Request $request,$id){
        $data = $request->validate(
            [
                'nameEdit'=>'required|string|max:121',
                'priceEdit'=>'required|string|max:121',
                'categoryEdit'=>'required|string|max:121|exists:categories,id',
                'trainerEdit'=>'required|string|max:121|exists:trainers,id',
                'brief_descEdit'=>'required|string|max:121',
                'full_descEdit'=>'required|string',
                'imageEdit'=>'image|mimes:jpg,png,jpeg',
                'seatsEdit'=>'required|numeric|max:15'
            ]);
        $course = Course::findOrFail($id);
        if($request->has('imageEdit')){
            Storage::delete('img/special_cource/'.$course->image);
            $newImgName = $data['imageEdit']->hashName();
            Image::make($data['imageEdit'])->resize(1024,512)->save(public_path('storage/img/special_cource/'.$newImgName));
            $data['imageEdit'] = $newImgName;
        }else{
            $data['imageEdit'] = $course->image;
        }
        $course->update([
            'name'=>$data['nameEdit'],
            'price'=>$data['priceEdit'],
            'category_id'=>$data['categoryEdit'],
            'trainer_id'=>$data['trainerEdit'],
            'brief_desc'=>$data['brief_descEdit'],
            'full_desc'=>$data['full_descEdit'],
            'image'=>$data['imageEdit'],
            'number_of_students'=>$data['seatsEdit']
            
    ]);
       session()->flash('success',"Course Updated Successfully");
        return redirect()->back();
    }

        //Students functions

    public function showStudents() {
        $students = Student::paginate(10);
        return view('admin.inc.students')->with(['students'=>$students]);

    }

    public function addStudent(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:121',
            'phone'=>'required|string|max:121',
            'email'=>'required|string|max:121|email',
            'course_id'=>'required|string|max:121|exists:courses,id',
            'spec'=>'required|string|max:121',

        ]);
        $course = Course::findOrFail($data['course_id']);
        if($course->number_of_students > 0){
            $student=Student::create(
                [
                    'name' =>$data['name'],
                    'phone'=>$data['phone'],
                    'email'=>$data['email'],
                    'spec'=>$data['spec'],
                    
                ]
            );
            $course->update(['number_of_students'=>($course->number_of_students - 1)]);
            $student_id = $student->id;
            DB::table('courses_students')->insert([
                'course_id'=>$data['course_id'],
                'student_id'=> $student_id,
                'created_at'=> now(),
                'updated_at'=>now()
            ]);
    
            session()->flash('success',"Student Added Successfully");
            return redirect()->back();

        }else{
            return redirect()->back()->withErrors('No seats available in this course');
        }
        
    }


    public function updateStudent(Request $request,$id){
        $student = Student::findOrFail($id);
        $data = $request->validate(
            [
                'nameEdit'=>'required|string|max:121',
                'phoneEdit'=>'required|string|max:121',
                'emailEdit'=>'required|max:121|email',
                'specEdit'=>'required|string|max:121',
                'courseEdit'=>'exists:courses,id',
                'statusEdit'=>'required'
            ]);

            $selectedCourse = Course::findOrFail($data['courseEdit']);

            if($selectedCourse->number_of_students > 0){
                $student->update([
                    'name' =>$data['nameEdit'],
                    'phone'=>$data['phoneEdit'],
                    'email'=>$data['emailEdit'],
                    'spec'=>$data['specEdit'],
        ]);
        
        if($data['statusEdit']!= 'pending'){
           Mail::to($data['emailEdit'])->send(new statusEmail($data));
        }
    
        DB::table('courses_students')->where('student_id','=',$student->id)->update([
            'course_id'=>$data['courseEdit'],'status'=>$data['statusEdit']]);
    
            session()->flash('success',"Student Updated Successfully");
            return redirect()->back();

            }else{
                return redirect()->back()->withErrors('The selected course has no available seats');  
            }

    }

    public function deleteStudent($id){
        $student = Student::findOrFail($id);
        $student->delete();
        session()->flash('success',"Student Deleted Successfully");
        return redirect()->back();
    }
    //Mails functions
    public function showMessages(){
        $messages = Message::all();
        return view('admin.inc.messages')->with(['messages'=>$messages]);
    }

   

    public function sendMail( Request $request, $id){
        $data = $request->validate([
            'subject'=>'required',
            'message'=>'required'
        ]);
        $message = Message::findOrFail($id);
        Mail::to($message->email)->send(new ResponseMail($data , $message ));
        session()->flash('success',"Message Sent Successfully");
        return redirect()->back();

    }

    // Testimonials

    public function showTestimonials(){
        $testimonials = Testomnial::all();
        return view('admin.inc.testimonials')->with(['adminTestimonials'=>$testimonials]);
    }

    public function deleteTestimonial($id){
        $testimonial = Testomnial::findOrFail($id);
        $testimonial->delete();
        session()->flash('success',"Testimonial Deleted Successfully");
        return redirect()->back();
    }

    public function addTestmonial(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:121',
            'desc'=>'required|string|max:121',
            'spec'=>'required|string|max:121',
            'image'=>'required|image'
        ]);
        $newImgName = $data['image']->hashName();
        Image::make($data['image'])->resize(263,611)->save(public_path('storage/img/testimonial/'.$newImgName));
        $data['image'] = $newImgName;
        Testomnial::create([
            'name'=>$data['name'],
            'desc'=>$data['desc'],
            'spec'=>$data['spec'],
            'image'=>$data['image']
        ]);
        session()->flash('success',"Testimonial Added Successfully");
        return redirect()->back();
    }

    public function updateTestimonial($id , Request $request){
        $data = $request->validate([
            'nameEdit'=>'required|string|max:121',
            'descEdit'=>'required|string|max:121',
            'specEdit'=>'required|string|max:121',
            'imageEdit'=>'image|mimes:jpg,png,jpeg'
        ]);
        $testimonial = Testomnial::findOrFail($id);
        if($request->has('imageEdit')){
            Storage::delete('img/testimonial/'.$testimonial->image);
            $newImgName = $data['imageEdit']->hashName();
            Image::make($data['imageEdit'])->resize(263,311)->save(public_path('storage/img/testimonial/'.$newImgName));
            $data['imageEdit'] = $newImgName;
        }else{
            $data['imageEdit'] = $testimonial->image;
        }

        $testimonial->update([
            'name'=>$data['nameEdit'],
            'desc'=>$data['descEdit'],
            'spec'=>$data['specEdit'],
            'image'=>$data['imageEdit']
        ]);
        
        session()->flash('success',"Testimonial Updated Successfully");
        return redirect()->back();

    }

}
