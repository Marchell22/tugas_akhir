<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('abcd1234'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'user',
            'username' => 'user',
            'password' => Hash::make('abcd1234'),
            'role' => 'user'
        ]);
    }
}
