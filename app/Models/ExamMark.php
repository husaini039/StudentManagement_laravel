<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    protected $table = 'exam_marks'; // Specify the table name if it differs from the default
    
    // this one responsible for mass assignment (can update or add inside the database)
    protected $fillable = [
        'student_id',
        'course_id',
        'mark',
        'grade',
    ];
    
    // Define relationships if necessary
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
