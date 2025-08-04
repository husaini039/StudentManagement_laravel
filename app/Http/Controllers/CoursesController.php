<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    // Display all courses with search and pagination
    public function displayAllCourse(Request $request){
        $query = Course::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('course_code', 'LIKE', "%{$search}%")
                  ->orWhere('course_name', 'LIKE', "%{$search}%")
                  ->orWhere('credit_hours', 'LIKE', "%{$search}%");
            });
        }

        $courses = $query->paginate(10);
        return view('course', compact('courses'));
    }
    
    // Show add form
    public function create()
    {
        return view('course.add');
    }
    
    // Store new course
    public function storeCourse(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1|max:10',
        ]);
        
        Course::create($request->all());
        
        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }
    
    // Show edit form
    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit', compact('course'));
    }
    
    // Update course
    public function updateCourse(Request $request, $id)
    {
        $request->validate([
            'course_code' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1|max:10',
        ]);
        
        $course = Course::findOrFail($id);
        $course->update($request->all());
        
        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }
    
    // Delete course
    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
