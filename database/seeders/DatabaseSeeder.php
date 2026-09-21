<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin1@autorepair.local'],
            [
                'name' => 'Admin 1',
                'password' => Hash::make('Admin12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin2@autorepair.local'],
            [
                'name' => 'Admin 2',
                'password' => Hash::make('Admin12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin3@autorepair.local'],
            [
                'name' => 'Admin 3',
                'password' => Hash::make('Admin12345'),
                'role' => 'admin',
            ]
        );
    }
}
