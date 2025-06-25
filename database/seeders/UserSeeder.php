<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'gn.nanda0@gmail.com',
            'password' => Hash::make('Admin#1234'),
            'name' => 'Gung Nanda',
        ]);
    }
}
