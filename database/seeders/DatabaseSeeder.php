<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(10)->create();
        User::create([
            'email' => 'gn.nanda0@gmail.com',
            'password' => Hash::make('Admin#1234'),
            'name' => 'Gung Nanda',
        ]);
    }
}
