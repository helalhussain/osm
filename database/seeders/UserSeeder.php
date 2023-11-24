<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'student_id'=>'230303020001',
            'name'=>'Chris Brown',
            'email'=>'brown@gmail.com',
            'phone'=>'01939275547',
            'address'=>'Jinda bazar, Sylhet',
            'password'=>bcrypt('12345678'),
            'status'=>false
        ];

        User::query()->updateOrCreate($user);
    }
}
