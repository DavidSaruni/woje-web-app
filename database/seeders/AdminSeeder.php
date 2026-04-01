<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'sarunidavid11126@gmail.com'],
            [
                'name' => 'WOJE Administrator',
                'email' => 'sarunidavid11126@gmail.com',
                'password' => Hash::make('Captain@001'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
