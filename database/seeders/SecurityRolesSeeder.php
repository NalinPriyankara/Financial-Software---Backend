<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SecurityRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('security_roles')->insert([
            [
                'role' => 'Admin',
                'description' => 'Administrator role with full access',
                'sections' => "1000;1100;1200",
                'areas' => "1101;1102;1103;1201;1202;1203",
                'inactive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'User',
                'description' => 'Regular user role with limited access',
                'sections' => "1000;1100",
                'areas' => "1101;1102;1103",
                'inactive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
