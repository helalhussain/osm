<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' =>  bcrypt('12345678'),
        ];

        Admin::query()->updateOrCreate($admin);
    }
}
