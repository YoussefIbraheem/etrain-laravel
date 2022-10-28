<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Trainer;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.inc.index');
    }


    public function login(){
        return view('admin.inc.login');
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

    public function showCategories(){
        $categories = Category::all();
        return view('admin.inc.categories',compact('categories'));
    }

    public function addCategory(Request $request){
        $data = $request->validate(['name'=>'required|string|max:121']);
        Category::create($data);
        return redirect()->back();
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function updateCategory(Request $request,$id){
        $data = $request->validate(['nameEdit'=>'required|string|max:121']);
        $category = Category::findOrFail($id);
        $category->update(['name'=>$data['nameEdit']]);
        return redirect()->back();
    }

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
        $data['profile_pic']= Storage::put('img/author', $request->profile_pic);
        Trainer::create(
            [
                'name'=>$data['name'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'spec'=>$data['spec'],
                'profile_pic'=>$data['profile_pic'],
                
            ]
        );
        return redirect()->back();
    }

    public function deleteTrainer($id){
        $category = Trainer::findOrFail($id);
        $category->delete();
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
            Storage::delete($trainer->profile_pic);
            $data['picEdit']=Storage::put('img/author', $request->picEdit);
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
        return redirect()->back();
    }


    public function showCourses(){
        $courses = Course::all();
        return view('admin.inc.courses',compact('courses'));
    }

    public function addCourse(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:121',
            'price'=>'required|string|max:121',
            'category'=>'required|string|max:121|exists:categories,id',
            'trainer'=>'required|string|max:121|exists:trainers,id',
            'brief_desc'=>'required|string|max:121',
            'full_desc'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jpeg',
        ]);
        $data['image']= Storage::put('img/special_cource', $request->image);
        Course::create(
            [
                'name'=>$data['name'],
                'price'=>$data['price'],
                'category_id'=>$data['category'],
                'trainer_id'=>$data['trainer'],
                'brief_desc'=>$data['brief_desc'],
                'full_desc'=>$data['full_desc'],
                'image'=>$data['image'],
                
            ]
        );
        return redirect()->back();
    }

    public function deleteCourse($id){
        $course = Course::findOrFail($id);
        $course->delete();
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
            ]);
        $course = Course::findOrFail($id);
        if($request->has('imageEdit')){
            Storage::delete($course->profile_pic);
            $data['imageEdit']=Storage::put('img/special_cource', $request->imageEdit);
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
            
    ]);
        return redirect()->back();
    }

    public function showStudents() {
        $students = Student::paginate(10);
        return view('admin.inc.students',compact('students'));

    }

    public function addStudent(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:121',
            'phone'=>'required|string|max:121',
            'email'=>'required|string|max:121|email|unique:students,email',
            'spec'=>'required|string|max:121',
        ]);
        Student::create(
            [
                'name' =>$data['name'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'spec'=>$data['spec'],
                
            ]
        );
        return redirect()->back();
    }


    public function updateStudent(Request $request,$id){
        $student = Student::findOrFail($id);
        $data = $request->validate(
            [
                'nameEdit'=>'required|string|max:121',
                'phoneEdit'=>'required|string|max:121',
                'emailEdit'=>'required|max:121|email|unique:students,email,'.$student->email.',email',
                'specEdit'=>'required|string|max:121'
            ]);
        
        $student->update([
                'name' =>$data['nameEdit'],
                'phone'=>$data['phoneEdit'],
                'email'=>$data['emailEdit'],
                'spec'=>$data['specEdit'],   
    ]);
        return redirect()->back();
    }

    public function deleteStudent($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back();
    }

}
