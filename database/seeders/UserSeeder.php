<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'email' => 'tatausaha@tu.com'
        ], [
            'name' => 'Tata Usaha',
            'password' => Hash::make('tatausaha'),
            'role' => 'tatausaha'
        ]);

        User::firstOrCreate([
            'email' => 'admin@superadmin.com'
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('superadmin'),
            'role' => 'admin'
        ]);
    }
}
