<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // Specify the table name if it differs from the default
    
    protected $fillable = [
        'name',
        'student_id',
        'email',
        'phone_number',
        'date_of_birth',
        'program',
        'part'
    ];
}
