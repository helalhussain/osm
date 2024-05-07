<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cls;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<10; $i++){
            Cls::create([
                'title' => 'Class '.$i,
                'description' => 'This is class '.$i,
                'status' => true
            ]);
        }
    }
}
