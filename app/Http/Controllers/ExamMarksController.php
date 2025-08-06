<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamMark;

class ExamMarksController extends Controller
{
    // Display all exam marks with search and pagination
    public function displayAllExamMarks(Request $request){
        $query = ExamMark::with(['student', 'course']);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_id', 'LIKE', "%{$search}%")
                  ->orWhere('course_id', 'LIKE', "%{$search}%")
                  ->orWhere('mark', 'LIKE', "%{$search}%")
                  ->orWhere('grade', 'LIKE', "%{$search}%")
                  ->orWhereHas('student', function($q) use ($search) {
                      $q->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('student_id', 'LIKE', "%{$search}%");
                  })
                  ->orWhereHas('course', function($q) use ($search) {
                      $q->where('course_name', 'LIKE', "%{$search}%")
                        ->orWhere('course_code', 'LIKE', "%{$search}%");
                  });
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
        ]);

        // Auto-calculate grade based on mark
        $mark = $request->mark;
        $grade = $this->calculateGrade($mark);

        ExamMark::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'mark' => $mark,
            'grade' => $grade,
        ]);

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
        ]);

        // Auto-calculate grade based on mark
        $mark = $request->mark;
        $grade = $this->calculateGrade($mark);

        $examMark = ExamMark::findOrFail($id);
        $examMark->update([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'mark' => $mark,
            'grade' => $grade,
        ]);

        return redirect()->route('exam_mark.index')->with('success', 'Exam mark updated successfully!');
    }

    // Helper method to calculate grade
    private function calculateGrade($mark)
    {
        if ($mark >= 90) {
            return 'A+';
        } elseif ($mark >= 80) {
            return 'A';
        } elseif ($mark >= 70) {
            return 'B';
        } elseif ($mark >= 60) {
            return 'C';
        } elseif ($mark >= 50) {
            return 'D';
        } else {
            return 'F';
        }
    }

    // Delete exam mark
    public function deleteExamMark($id)
    {
        $examMark = ExamMark::findOrFail($id);
        $examMark->delete();

        return redirect()->route('exam_mark.index')->with('success', 'Exam mark deleted successfully!');
    }

}
