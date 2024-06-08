<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test teacher',
            'username' => 'teacher',
            'subject' => 'math',
        ]);

        User::factory()->create([
            'name' => 'Test student',
            'username' => 'student',
            'class' => 6,
        ]);

    }
}
