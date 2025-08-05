<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses'; // the table name 
    
    // this one responsible for mass assignment (can update or add inside the database)
    protected $fillable = [
        'course_code',
        'course_name',
        'credit_hours',
    ];
    
}
