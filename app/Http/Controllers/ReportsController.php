<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\ExamMark;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        // Get student average marks with course details
        $studentAverages = DB::table('students')
            ->leftJoin('exam_marks', 'students.id', '=', 'exam_marks.student_id')
            ->leftJoin('courses', 'exam_marks.course_id', '=', 'courses.id')
            ->select(
                'students.id as student_id',
                'students.name as student_name',
                'students.student_id as student_code',
                DB::raw('AVG(exam_marks.mark) as average_mark'),
                DB::raw('COUNT(exam_marks.id) as total_subjects'),
                DB::raw('CASE 
                    WHEN AVG(exam_marks.mark) >= 90 THEN "A+"
                    WHEN AVG(exam_marks.mark) >= 80 THEN "A"
                    WHEN AVG(exam_marks.mark) >= 70 THEN "B"
                    WHEN AVG(exam_marks.mark) >= 60 THEN "C"
                    WHEN AVG(exam_marks.mark) >= 50 THEN "D"
                    ELSE "F"
                END as grade')
            )
            ->groupBy('students.id', 'students.name', 'students.student_id')
            ->having('total_subjects', '>', 0)
            ->orderBy('average_mark', 'desc')
            ->paginate(10);

        // Get subject average marks
        $subjectAverages = DB::table('courses')
            ->leftJoin('exam_marks', 'courses.id', '=', 'exam_marks.course_id')
            ->select(
                'courses.course_code',
                'courses.course_name',
                DB::raw('COUNT(exam_marks.student_id) as total_students'),
                DB::raw('MAX(exam_marks.mark) as highest_mark'),
                DB::raw('MIN(exam_marks.mark) as lowest_mark'),
                DB::raw('AVG(exam_marks.mark) as average_mark'),
                DB::raw('CASE 
                    WHEN AVG(exam_marks.mark) >= 90 THEN "Excellent"
                    WHEN AVG(exam_marks.mark) >= 80 THEN "Good"
                    WHEN AVG(exam_marks.mark) >= 70 THEN "Average"
                    WHEN AVG(exam_marks.mark) >= 60 THEN "Below Average"
                    ELSE "Poor"
                END as performance_level')
            )
            ->groupBy('courses.id', 'courses.course_code', 'courses.course_name')
            ->having('total_students', '>', 0)
            ->orderBy('average_mark', 'desc')
            ->paginate(10);

        // Get detailed student marks for each course
        $studentMarks = DB::table('students')
            ->leftJoin('exam_marks', 'students.id', '=', 'exam_marks.student_id')
            ->leftJoin('courses', 'exam_marks.course_id', '=', 'courses.id')
            ->select(
                'students.id as student_id',
                'students.name as student_name',
                'courses.course_name',
                'exam_marks.mark',
                'exam_marks.grade'
            )
            ->orderBy('students.name')
            ->orderBy('courses.course_name')
            ->paginate(10);

        return view('report', compact('studentAverages', 'subjectAverages', 'studentMarks'));
    }
} 