<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = [
            'name'=>'Teacher',
            'email'=>'teacher@gmail.com',
            'phone'=>'01939275547',
            'address'=>'Jinda bazar, Sylhet',
            'password'=>bcrypt('12345678'),
            'status'=>false
        ];

        Teacher::query()->updateOrCreate($teacher);
    }
}
