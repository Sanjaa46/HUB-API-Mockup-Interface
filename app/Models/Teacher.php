<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'department_id',
        'department_name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'academic_degree'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_teacher');
    }
}