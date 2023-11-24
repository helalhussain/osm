<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administator;

class AdministatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administator = [
            'name' => 'Administator',
            'email' => 'administator@gmail.com',
            'password' =>  bcrypt('12345678'),
        ];

        Administator::query()->updateOrCreate($administator);
    }
}
