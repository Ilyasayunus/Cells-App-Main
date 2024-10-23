<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create(
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@dpr.go.id',
                'password' => bcrypt('password')
            ]
        );
        User::create(
            [
                'name' => 'Admin Cells',
                'username' => 'admincells',
                'email' => 'AdminCells@upi.edu',
                'password' => bcrypt('password')
            ]
        );
    }
}
