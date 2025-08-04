<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    // Display all students with search and pagination
    public function displayAllStudent(Request $request){
        $query = Student::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('student_id', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('program', 'LIKE', "%{$search}%");
            });
        }
        
        $students = $query->paginate(10);
        return view('student', compact('students'));
    }
    
    // Delete student
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
    
    // Show edit form
    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }
    
    // Update student
    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'program' => 'required|string|max:255',
            'part' => 'required|integer|min:1|max:6',
        ]);
        
        $student = Student::findOrFail($id);
        $student->update($request->all());
        
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
}
