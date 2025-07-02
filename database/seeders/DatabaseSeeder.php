<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
           'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'department_id' => 1,
            'role_id' => 1,
            'designation' => 'Developer',
            'start_from' => now()->toDateString(),
            'image' => 'default.jpg',
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
        ]);
    }
}
