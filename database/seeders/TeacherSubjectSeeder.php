<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = User::role('Teacher')->get();
        $subjects = Subject::all();

        foreach ($teachers as $teacher) {
            $randomSubjects = $subjects->random(5)->pluck('id');
            $teacher->subjects()->attach($randomSubjects);
        }
    }
}
