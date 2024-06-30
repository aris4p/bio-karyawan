<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Employee::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('traine123'),
            'isAdmin' => '0'
        ]);
    }
}
