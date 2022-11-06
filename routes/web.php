<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});
Route::get('/',[HomePageController::class,'mainPage'])->name('front.inc.index');
Route::get('/courses',[CourseController::class,'mainPage'])->name('front.inc.courses');
Route::get('/category/{id}',[CourseController::class,'category'])->name('front.inc.category');
Route::get('/course_details/{id}',[CourseController::class,'showCourse'])->name('front.inc.course');
Route::post('/enroll',[CourseController::class,'enroll'])->name('front.inc.enroll');
Route::get('/contacts',[HomePageController::class,'showContacts'])->name('front.inc.contacts');
Route::post('/newsletter',[HomePageController::class,'newsletter'])->name('front.inc.newsletter');
Route::get('/show_about',[HomePageController::class,'showAbout'])->name('front.inc.about');
route::get('/show_blog',[HomePageController::class,'showBlog'])->name('front.inc.blog');
route::post('/send_email',[HomePageController::class,'sendEmail'])->name('front.inc.mail');


Route::namespace('Admin')->prefix('dashboard')->group(function(){
    Route::middleware('adminAuth')->group(function(){
        // MAIN
        route::get('/',[AdminController::class,'index'])->name('front.admin.index');
        route::get('/logout',[AdminController::class,'logout'])->name('front.admin.logout');
        // Categories
        route::get('/show_categories',[AdminController::class,'showCategories'])->name('front.admin.categories');
        route::post('/add_category',[AdminController::class,'addCategory'])->name('front.admin.addCategory');
        route::post('/update_category/{id}',[AdminController::class,'updateCategory'])->name('front.admin.updateCategory');
        route::delete('/delete_category/{id}',[AdminController::class,'deleteCategory'])->name('front.admin.deleteCategory');
        // Trainers
        route::get('/show_trainers',[AdminController::class,'showTrainers'])->name('front.admin.showTrainers');
        route::post('/add_trainer',[AdminController::class,'addTrainer'])->name('front.admin.addTrainer');
        route::post('/update_trainer/{id}',[AdminController::class,'updateTrainer'])->name('front.admin.updateTrainer');
        route::delete('/delete_trainer/{id}',[AdminController::class,'deleteTrainer'])->name('front.admin.deleteTrainer');
        // Courses
        route::get('/show_courses',[AdminController::class,'showCourses'])->name('front.admin.showCourses');
        route::post('/add_course',[AdminController::class,'addCourse'])->name('front.admin.addCourse');
        route::post('/update_course/{id}',[AdminController::class,'updateCourse'])->name('front.admin.updateCourse');
        route::delete('/delete_course/{id}',[AdminController::class,'deleteCourse'])->name('front.admin.deleteCourse');
        //Students
        route::get('/show_students',[AdminController::class,'showStudents'])->name('front.admin.showStudents');
        route::post('/add_student',[AdminController::class,'addStudent'])->name('front.admin.addStudent');
        route::post('/update_student/{id}',[AdminController::class,'updateStudent'])->name('front.admin.updateStudent');
        route::delete('/delete_student/{id}',[AdminController::class,'deleteStudent'])->name('front.admin.deleteStudent');
        //MAIL
        route::get('/show_messages',[AdminController::class,'showMessages'])->name('front.admin.showMessages');
        route::post('/send_mail/{id}',[AdminController::class,'sendMail'])->name('front.admin.sendMail');
        //Testimonials
        route::get('/show_testimonials',[AdminController::class,'showTestimonials'])->name('front.admin.showTestimonials');
        route::delete('/delete_testimonial/{id}',[AdminController::class,'deleteTestimonial'])->name('front.admin.deleteTestimonial');
        route::post('/add_testimonial',[AdminController::class,'addTestmonial'])->name('front.admin.addTestimonial');
        route::post('/update_testimonial/{id}',[AdminController::class,'updateTestimonial'])->name('front.admin.updateTestimonial');
    });
    //ADMIN LOGIN
       route::get('/login',[AdminController::class,'login'])->name('front.admin.login');
       route::post('/sign_in',[AdminController::class,'signIn'])->name('front.admin.signIn');
});
