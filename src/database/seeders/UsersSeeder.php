<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\Models\User::insert([
            'userid' => 'isAdmin',
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'status' => '1',
            'updateby' => 'admin',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'email_verified_at' => \Carbon\Carbon::now('Asia/Jakarta'),
        ]);

        \App\Models\User::insert([
            'userid' => 'isUser',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'status' => '1',
            'updateby' => 'admin',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'email_verified_at' => \Carbon\Carbon::now('Asia/Jakarta'),
        ]);

    }
}