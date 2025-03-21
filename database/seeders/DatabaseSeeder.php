<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create departments
        $mcst = Department::create(['name' => 'МКУТ (Математик, Компьютер, Техникийн)']);
        $physics = Department::create(['name' => 'Физик Электроникийн']);
        $biology = Department::create(['name' => 'Биологийн']);
        
        // Create programs
        $computerScience = Program::create([
            'name' => 'Компьютерийн ухаан',
            'index' => 'D0612345',
            'department_id' => $mcst->id
        ]);
        
        $infoSystems = Program::create([
            'name' => 'Мэдээллийн системийн удирдлага',
            'index' => 'D0612346',
            'department_id' => $mcst->id
        ]);
        
        $physics = Program::create([
            'name' => 'Физик',
            'index' => 'D0712345',
            'department_id' => $physics->id
        ]);
        
        $biology = Program::create([
            'name' => 'Биологи',
            'index' => 'D0812345',
            'department_id' => $biology->id
        ]);
        
        // Create teachers
        $teacher1 = Teacher::create([
            'department_id' => $mcst->id,
            'department_name' => $mcst->name,
            'first_name' => 'Бат',
            'last_name' => 'Дорж',
            'email' => 'bat.dorj@num.edu.mn',
            'phone' => '99112233',
            'position' => 'Профессор',
            'academic_degree' => 'Доктор (Ph.D)'
        ]);
        
        $teacher2 = Teacher::create([
            'department_id' => $mcst->id,
            'department_name' => $mcst->name,
            'first_name' => 'Болд',
            'last_name' => 'Сүхбаатар',
            'email' => 'bold.sukhbaatar@num.edu.mn',
            'phone' => '99223344',
            'position' => 'Дэд профессор',
            'academic_degree' => 'Магистр'
        ]);
        
        $teacher3 = Teacher::create([
            'department_id' => $physics->id,
            'department_name' => $physics->name,
            'first_name' => 'Золбоо',
            'last_name' => 'Дамдин',
            'email' => 'zolboo.damdin@num.edu.mn',
            'phone' => '99334455',
            'position' => 'Ахлах багш',
            'academic_degree' => 'Доктор (Ph.D)'
        ]);
        
        // Create students
        $student1 = Student::create([
            'sisi_id' => 'ST12345',
            'first_name' => 'Намдаг',
            'last_name' => 'Гантулга',
            'student_email' => 'namdag.gantulga@stud.num.edu.mn',
            'personal_email' => 'namdag.gantulga@gmail.com',
            'program_name' => $computerScience->name,
            'program_id' => $computerScience->id,
            'phone' => '88112233',
            'department_id' => $mcst->id,
            'has_selected_research' => true
        ]);
        
        $student2 = Student::create([
            'sisi_id' => 'ST12346',
            'first_name' => 'Очир',
            'last_name' => 'Пүрэв',
            'student_email' => 'ochir.purev@stud.num.edu.mn',
            'personal_email' => 'ochir.purev@gmail.com',
            'program_name' => $computerScience->name,
            'program_id' => $computerScience->id,
            'phone' => '88223344',
            'department_id' => $mcst->id,
            'has_selected_research' => true
        ]);
        
        $student3 = Student::create([
            'sisi_id' => 'ST12347',
            'first_name' => 'Сүхээ',
            'last_name' => 'Батаа',
            'student_email' => 'sukhee.bataa@stud.num.edu.mn',
            'personal_email' => 'sukhee.bataa@gmail.com',
            'program_name' => $infoSystems->name,
            'program_id' => $infoSystems->id,
            'phone' => '88334455',
            'department_id' => $mcst->id,
            'has_selected_research' => true
        ]);
        
        $student4 = Student::create([
            'sisi_id' => 'ST12348',
            'first_name' => 'Мөнх',
            'last_name' => 'Цэцэг',
            'student_email' => 'munkh.tsetseg@stud.num.edu.mn',
            'personal_email' => 'munkh.tsetseg@gmail.com',
            'program_name' => $infoSystems->name,
            'program_id' => $infoSystems->id,
            'phone' => '88445566',
            'department_id' => $mcst->id,
            'has_selected_research' => false
        ]);
        
        $student5 = Student::create([
            'sisi_id' => 'ST12349',
            'first_name' => 'Золжаргал',
            'last_name' => 'Дулам',
            'student_email' => 'zoljargal.dulam@stud.num.edu.mn',
            'personal_email' => 'zoljargal.dulam@gmail.com',
            'program_name' => $physics->name,
            'program_id' => $physics->id,
            'phone' => '88556677',
            'department_id' => $physics->id,
            'has_selected_research' => true
        ]);
        
        // Create relationships between teachers and students (advisors)
        DB::table('student_teacher')->insert([
            ['student_id' => $student1->id, 'teacher_id' => $teacher1->id],
            ['student_id' => $student2->id, 'teacher_id' => $teacher1->id],
            ['student_id' => $student3->id, 'teacher_id' => $teacher2->id],
            ['student_id' => $student5->id, 'teacher_id' => $teacher3->id]
        ]);
    }
}