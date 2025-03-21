<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('sisi_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('student_email')->unique(); // @stud.num.edu.mn
            $table->string('personal_email')->nullable();
            $table->string('program_name');
            $table->foreignId('program_id')->constrained();
            $table->string('phone')->nullable();
            $table->foreignId('department_id')->constrained();
            $table->boolean('has_selected_research')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};