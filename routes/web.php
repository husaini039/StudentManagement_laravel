<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('index');
});

//test route
Route::get('/testpage', function () {
    return "i swear this is a test page";
});

Route::get('/dummy', function () {
    return view('dummy');
});

Route::get('/student', [StudentsController::class, 'displayAllStudent'])->name('students.index');
Route::delete('/student/{id}', [StudentsController::class, 'deleteStudent'])->name('students.delete');
Route::get('/student/{id}/edit', [StudentsController::class, 'editStudent'])->name('students.edit');
Route::put('/student/{id}', [StudentsController::class, 'updateStudent'])->name('students.update');

Route::get('/exam_mark', function () {
    return view('exam_mark');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/course', function () {
    return view('course');
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
