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
                //basically simple grading based value
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
                 //on eachcount to find max min and and the average for marks 
                DB::raw('COUNT(exam_marks.student_id) as total_students'),
                DB::raw('MAX(exam_marks.mark) as highest_mark'),
                DB::raw('MIN(exam_marks.mark) as lowest_mark'),
                DB::raw('AVG(exam_marks.mark) as average_mark'),
                //checks for exam mark perfomacance level that state in the table
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

    // Export Student Averages to CSV
    public function exportStudentAverages()
    {
        $filename = 'student_averages_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Student ID', 'Student Name', 'Total Subjects', 'Average Mark', 'Grade']);
            
            // Get student averages data
            $studentAverages = DB::table('students')
                ->leftJoin('exam_marks', 'students.id', '=', 'exam_marks.student_id')
                ->leftJoin('courses', 'exam_marks.course_id', '=', 'courses.id')
                ->select(
                    'students.student_id as student_code',
                    'students.name as student_name',
                    DB::raw('COUNT(exam_marks.id) as total_subjects'),
                    DB::raw('AVG(exam_marks.mark) as average_mark'),
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
                ->get();

            // Add data rows
            foreach ($studentAverages as $student) {
                fputcsv($file, [
                    $student->student_code,
                    $student->student_name,
                    $student->total_subjects,
                    number_format($student->average_mark, 1),
                    $student->grade
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Export Subject Averages to CSV
    public function exportSubjectAverages()
    {
        $filename = 'subject_averages_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Course Code', 'Course Name', 'Total Students', 'Highest Mark', 'Lowest Mark', 'Average Mark', 'Performance Level']);
            
            // Get subject averages data
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
                ->get();

            // Add data rows
            foreach ($subjectAverages as $subject) {
                fputcsv($file, [
                    $subject->course_code,
                    $subject->course_name,
                    $subject->total_students,
                    $subject->highest_mark,
                    $subject->lowest_mark,
                    number_format($subject->average_mark, 1),
                    $subject->performance_level
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Export Detailed Student Marks to CSV
    public function exportDetailedMarks()
    {
        $filename = 'detailed_student_marks_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Student ID', 'Student Name', 'Subject', 'Mark', 'Grade']);
            
            // Get detailed student marks data
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
                ->get();

            // Add data rows
            foreach ($studentMarks as $mark) {
                fputcsv($file, [
                    $mark->student_id,
                    $mark->student_name,
                    $mark->course_name,
                    $mark->mark,
                    $mark->grade
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
} 