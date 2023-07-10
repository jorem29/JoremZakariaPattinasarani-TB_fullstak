<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make('admin'),
            'remember_token'=> Str::random(10),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make('user'),
            'remember_token'=> Str::random(10),
            'role' => 'user',
        ]);

    }
}
