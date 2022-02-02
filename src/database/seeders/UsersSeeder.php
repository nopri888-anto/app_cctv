<?php

namespace Database\Seeders;

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
            'password' => bcrypt('admin12345'),
            'status' => '1',
            'updateby' => 'admin',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'email_verified_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'level' => '1',
        ]);

        \App\Models\User::insert([
            'userid' => 'isAuditor',
            'username' => 'Auditor 1',
            'email' => 'auditor@gmail.com',
            'password' => bcrypt('user12345'),
            'status' => '1',
            'updateby' => 'admin',
            'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'email_verified_at' => \Carbon\Carbon::now('Asia/Jakarta'),
            'level' => '2',
        ]);
    }
}
