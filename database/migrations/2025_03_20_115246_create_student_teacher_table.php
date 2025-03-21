<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->timestamps();
            
            $table->unique(['student_id', 'teacher_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_teacher');
    }
};