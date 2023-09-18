<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'Jalan Raya Pemogan Gang Anggrek 8 No 7',
            'nohp' => '088929392103',
            'password' => Hash::make('admin'),
            'role' => '1'
        ]);

    }
}