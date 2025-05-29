<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'edjo90@yahoo',
            'email' => 'edjo90@yahoo.com',
            'password' => bcrypt('Pk2k3@noslimde')
        ]);

        User::create([
            'name' => 'computatrum@siga',
            'email' => 'computatrum@siga.com',
            'password' => bcrypt('Pk@130517')
        ]);

        User::create([
            'name' => 'edjo90@gmail',
            'email' => 'edjo90@gmail.com',
            'password' => bcrypt('pk2k3@noslimde')
        ]);
    }
}
