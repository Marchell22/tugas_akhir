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
            'name' => 'Tomu',
            'username' => 'Tomu22',
            'email' => 'tomu@tomu.com',
            'password' => Hash::make('abcd1234'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Marchell',
            'username' => 'Marchell22',
            'email' => 'Marchell@Marchell.com',
            'password' => Hash::make('abcd1234'),
            'role' => 'user'
        ]);
    }
}
