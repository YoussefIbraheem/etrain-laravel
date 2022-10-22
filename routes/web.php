<?php

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
Route::get('/',[HomePageController::class,'mainPage']);
Route::get('/courses',[CourseController::class,'mainPage']);
Route::get('/category/{id}',[CourseController::class,'category']);
Route::get('/course_details/{id}',[CourseController::class,'showCourse']);
Route::get('/contacts',[HomePageController::class,'showContacts']);
Route::post('/newsletter',[HomePageController::class,'newsletter']);
Route::get('/show_about',[HomePageController::class,'showAbout']);
route::get('/show_blog',[HomePageController::class,'showBlog']);