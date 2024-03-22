<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'city' => 'Texas',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '28/12/2000')->format('Y-m-d'),
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 1,
        ]);
        
        // Creazione dell'utente User
        User::create([
            'name' => 'User',
            'lastname' => 'Admin',
            'city' => 'Texas',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '28/12/2000')->format('Y-m-d'),
            'email' => 'user@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 2,
        ]);
        
        // Creazione dell'utente UserMinor
        User::create([
            'name' => 'UserMinor',
            'lastname' => 'Admin',
            'city' => 'Texas',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '28/12/2010')->format('Y-m-d'),
            'email' => 'userminor@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 2,
        ]);
    }
}
