<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamMark;

class ExamMarksController extends Controller
{
    // Display all exam marks with search and pagination
    public function displayAllExamMarks(Request $request){
        $query = ExamMark::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_id', 'LIKE', "%{$search}%")
                  ->orWhere('course_id', 'LIKE', "%{$search}%")
                  ->orWhere('mark', 'LIKE', "%{$search}%")
                  ->orWhere('grade', 'LIKE', "%{$search}%");
            });
        }

        $examMarks = $query->paginate(10);
        return view('exam_mark', compact('examMarks'));
    }

    // Show add form
    public function create()
    {
        return view('exam_mark.add');
    }

    // Store new exam mark
    public function storeExamMark(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'course_id' => 'required|integer|exists:courses,id',
            'mark' => 'required|numeric|min:0|max:100',
            'grade' => 'required|string|max:2',
        ]);

        ExamMark::create($request->all());

        return redirect()->route('exam_mark.index')->with('success', 'Exam mark added successfully!');
    }

    // Show edit form
    public function editExamMark($id)
    {
        $examMark = ExamMark::findOrFail($id);
        return view('exam_mark.edit', compact('examMark'));
    }

    // Update exam mark
    public function updateExamMark(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'course_id' => 'required|integer|exists:courses,id',
            'mark' => 'required|numeric|min:0|max:100',
            'grade' => 'required|string|max:2',
        ]);

        $examMark = ExamMark::findOrFail($id);
        $examMark->update($request->all());

        return redirect()->route('exam_mark.index')->with('success', 'Exam mark updated successfully!');
    }

    // Delete exam mark
    public function deleteExamMark($id)
    {
        $examMark = ExamMark::findOrFail($id);
        $examMark->delete();

        return redirect()->route('exam_mark.index')->with('success', 'Exam mark deleted successfully!');
    }

}
