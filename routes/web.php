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

Route::get('/dummy', [StudentsController::class, 'displayAllStudent']);

//post route example
Route::post('/formsubmit', function (Request $request) {
//validate the data input
$request->validate([
        'name' => 'required|string|min:5|max:10',
    ]);

    $name = $request->input('name');
    return "name is $name";

})->name('formsubmit');
