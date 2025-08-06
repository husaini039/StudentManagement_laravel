<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\ExamMark;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalExams = ExamMark::count();

        // Get top performing students
        $topStudents = DB::table('students')
            ->leftJoin('exam_marks', 'students.id', '=', 'exam_marks.student_id')
            ->leftJoin('courses', 'exam_marks.course_id', '=', 'courses.id')
            ->select(
                'students.student_id as student_code',
                'students.name as student_name',
                'courses.course_name',
                'exam_marks.mark',
                'exam_marks.grade'
            )
            ->whereNotNull('exam_marks.mark')
            ->orderBy('exam_marks.mark', 'desc')
            ->limit(5)
            ->get();

        // Get recent enrollments (ordered by student id as a proxy for recent)
        $recentEnrollments = Student::orderBy('id', 'desc')
            ->limit(5)
            ->get();

        // Get recent exam results (ordered by exam_marks.id as a proxy for recent)
        $recentExamResults = DB::table('exam_marks')
            ->leftJoin('students', 'exam_marks.student_id', '=', 'students.id')
            ->leftJoin('courses', 'exam_marks.course_id', '=', 'courses.id')
            ->select(
                'students.student_id as student_code',
                'students.name as student_name',
                'courses.course_name',
                'exam_marks.mark',
                'exam_marks.grade',
                'exam_marks.id'
            )
            ->orderBy('exam_marks.id', 'desc')
            ->limit(5)
            ->get();

        // Get performance statistics
        $averageMark = ExamMark::avg('mark');
        $highestMark = ExamMark::max('mark');
        $lowestMark = ExamMark::min('mark');

        // Get grade distribution
        $gradeDistribution = DB::table('exam_marks')
            ->select('grade', DB::raw('COUNT(*) as count'))
            ->groupBy('grade')
            ->orderBy('grade')
            ->get();

        return view('index', compact(
            'totalStudents',
            'totalCourses', 
            'totalExams',
            'topStudents',
            'recentEnrollments',
            'recentExamResults',
            'averageMark',
            'highestMark',
            'lowestMark',
            'gradeDistribution'
        ));
    }
} 