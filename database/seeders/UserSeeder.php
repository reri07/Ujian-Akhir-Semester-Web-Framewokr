<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user@gmail.com',
            'email' => 'user@gmail.com',
            'alamat' => 'Leneng',
            'nik' => '87482934789',
            'no_hp' => '9873847289',
            'role' => '1',
            // 'nik' => '3298329023',
            // 'email_verified_at' => 'andre@gmail.com',
            'password' => Hash::make('user123')
        ]);
    }
}
