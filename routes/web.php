<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::patch('/class/book/student/{class_id}',[BookingController::class,'studentBookClass'])->name('student.book');
Route::get('/booked/classes/teacher',[TeacherController::class,'bookedClasses'])->name('teacher.booked.classes');
Route::patch('/class/end/{class_id}',[TeacherController::class,'endClass'])->name('teacher.end.class');

Route::group(['prefix'=>'admin', 'as'=>'admin.'],function(){
    Route::get('/index',[AdminController::class,'index'])->name('index');
    Route::resource('/teachers',TeacherController::class);
    Route::delete('/delete/teacher/{id}',[AdminController::class,'deleteTeacher'])->name('delete.teacher');
    Route::patch('/restore/teacher/{id}',[AdminController::class,'restoreTeacher'])->name('restore.teacher');

    Route::resource('/students', StudentController::class);
    Route::delete('/delete/student/{id}',[AdminController::class,'deactivateStudent'])->name('delete.student');
    Route::resource('/classroom',ClassroomController::class);

    #teacher booking
    Route::get('/booking',[BookingController::class,'index'])->name('book.index');
    Route::patch('/class/book/{class_id}',[BookingController::class,'teacherBookClass'])->name('teacher.book');


});

});
