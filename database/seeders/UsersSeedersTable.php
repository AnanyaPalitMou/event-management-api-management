<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role'=>'admin', 
            'name'=>'App Admin',
            'email'=>'app_admin@example.com',
            'password'=>Hash::make('password')

        ]);

        User::create([
            'role'=>'event_admin', 
            'name'=>'Event Admin',
            'email'=>'event_admin@example.com',
            'password'=>Hash::make('password')

        ]);

        User::create([
            'role'=>'user', 
            'name'=>'Ananya',
            'email'=>'ananya@example.com',
            'password'=>Hash::make('password')

        ]);

        User::create([
            'role'=>'user', 
            'name'=>'Mou',
            'email'=>'mou@example.com',
            'password'=>Hash::make('password')

        ]);

        User::create([
            'role'=>'user', 
            'name'=>'Atri',
            'email'=>'atri@example.com',
            'password'=>Hash::make('password')

        ]);
    }
}
