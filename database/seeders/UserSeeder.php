<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Watesnegoro',
                'username' => 'admin',
                'email' => null,
                'email_verified_at' => null,
                'role' => 'admin',
                'avatar' => null,
                'password' => Hash::make('d3saw4t3snegor0!'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff Desa',
                'username' => 'staff',
                'email' => null,
                'email_verified_at' => null,
                'role' => 'staff',
                'avatar' => null,
                'password' => Hash::make('d3saw4t3snegor0!'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Warga Contoh',
                'username' => 'warga',
                'email' => null,
                'email_verified_at' => null,
                'role' => 'warga',
                'avatar' => null,
                'password' => Hash::make('d3saw4t3snegor0!'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
