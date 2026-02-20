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
                'sections' => "1000;1100;1200;1300;1400;1500;1600;1700;1800;1900;2000;2100;2200",
                'areas' => "1101;1102;1103;1201;1202;1301;1302;1303;1401;1402;1403;1501;1502;1503;1601;1602;1603;1701;1702;1703;1801;1802;1803;1901;1902;2001;2002;2101;2201;2202",
                'inactive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'User',
                'description' => 'Regular user role with limited access',
                'sections' => "1000;1100;1300;1400;1500;1600;1700;1800;1900;2000;2100",
                'areas' => "1101;1102;1103;1301;1302;1303;1401;1402;1403;1501;1502;1503;1601;1602;1603;1701;1702;1703;1801;1802;1803;1901;1902;2001;2002;2101",
                'inactive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
