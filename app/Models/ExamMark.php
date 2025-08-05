<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    protected $table = 'exam_marks'; // this specifies the table name
    
    // this one responsible for mass assignment (can update or add inside the database)
    protected $fillable = [
        'student_id',
        'course_id',
        'mark',
        'grade',
    ];
    
    // relatiopn define
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
