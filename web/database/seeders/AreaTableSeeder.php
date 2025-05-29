<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::create([
            'tipo'  => 1,
            'nome' => 'CIVIL'
        ]);

        Area::create([
            'tipo'  => 2,
            'nome' => 'PENAL'
        ]);

        Area::create([
            'tipo'  => 3,
            'nome' => 'TRABALHISTA'
        ]);

        Area::create([
            'tipo'  => 4,
            'nome' => 'TRIBUTÁRIO'
        ]);

        Area::create([
            'tipo'  => 5,
            'nome' => 'ADMINISTRATIVO'
        ]);
    }
}
