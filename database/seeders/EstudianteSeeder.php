<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    
    public function run(): void
    {
        \App\Models\Estudiante::factory(50)->create();
    }
}
