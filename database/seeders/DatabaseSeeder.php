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
        \App\Models\User::factory()->create([
            'name' => 'Admin JustTrip',
            'email' => 'admin@justtrip.com',
            'role' => \App\Enums\UserRole::Admin,
            'is_active' => true,
        ]);
    }
}
