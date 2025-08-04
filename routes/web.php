<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dummy', function () {
    return view('dummy');
});

//student routes
Route::get('/student', [StudentsController::class, 'displayAllStudent'])->name('students.index'); //this one that display the table
Route::delete('/student/{id}', [StudentsController::class, 'deleteStudent'])->name('students.delete'); //delete  (use delete) student
Route::get('/student/{id}/edit', [StudentsController::class, 'editStudent'])->name('students.edit'); //edit student page
Route::put('/student/{id}', [StudentsController::class, 'updateStudent'])->name('students.update');  //update student

Route::get('/student/add', [StudentsController::class, 'create'])->name('students.add'); //go to add page
Route::post('/student', [StudentsController::class, 'addStudent'])->name('students.store'); //add student

//course routes
Route::get('/course', [CoursesController::class, 'displayAllCourse'])->name('courses.index');
Route::get('/course/add', [CoursesController::class, 'create'])->name('courses.add');
Route::post('/course', [CoursesController::class, 'storeCourse'])->name('courses.store');
Route::delete('/course/{id}', [CoursesController::class, 'deleteCourse'])->name('courses.delete');
Route::get('/course/{id}/edit', [CoursesController::class, 'editCourse'])->name('courses.edit');
Route::put('/course/{id}', [CoursesController::class, 'updateCourse'])->name('courses.update');

Route::get('/exam_mark', function () {
    return view('exam_mark');
});
Route::get('/index', function () {
    return view('index');
});





//post route example
Route::post('/formsubmit', function (Request $request) {
//validate the data input
$request->validate([
        'name' => 'required|string|min:5|max:10',
    ]);

    $name = $request->input('name');
    return "name is $name";

})->name('formsubmit');
