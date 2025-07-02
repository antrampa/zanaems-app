<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = require database_path('data/permissions_data.php');

        foreach ($roles as $role) {
            DB::table('permissions')->insert((array) $role);
        }
    }
}
