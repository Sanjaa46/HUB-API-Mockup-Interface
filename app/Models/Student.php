<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'sisi_id',
        'first_name',
        'last_name',
        'student_email',
        'personal_email',
        'program_name',
        'program_id',
        'phone',
        'department_id',
        'has_selected_research'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
