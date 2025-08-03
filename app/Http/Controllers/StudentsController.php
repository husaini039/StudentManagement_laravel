<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    //testing funciton to display all students attributes
    public function displayAllStudent(){
         $students = Student::all(); // Fetch all students from the database
         return view('dummy', compact('students'));
    }
}
