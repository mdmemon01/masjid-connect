<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Imam Abdullah',
            'email' => 'imam.abdullah@example.com', // Changed email to avoid conflict
            'password' => bcrypt('password'),
            'role' => 'imam',
        ]);
        
        // Add a couple more imam users for testing
        \App\Models\User::create([
            'name' => 'Imam Muhammad',
            'email' => 'imam.muhammad@example.com',
            'password' => bcrypt('password'),
            'role' => 'imam',
        ]);
        
        \App\Models\User::create([
            'name' => 'Imam Ali',
            'email' => 'imam.ali@example.com',
            'password' => bcrypt('password'),
            'role' => 'imam',
        ]);
    }
}