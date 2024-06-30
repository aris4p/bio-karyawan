<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'posisi' => 'Admin',
            'nama' => 'Aris Anggara',
            'email' => 'admin@admin.com',
            'password' => Hash::make('traine123'),
            'isAdmin' => '1',
        ]);
    }
}
