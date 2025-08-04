<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses'; // Specify the table name if it differs from the default
    
    // this one responsible for mass assignment (can update or add inside the database)
    protected $fillable = [
        'course_code',
        'course_name',
        'credit_hours',
    ];
    
}
