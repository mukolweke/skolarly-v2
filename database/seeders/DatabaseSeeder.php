<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear the user with the specified email if it exists
        User::where('email', 'test@example.com')->delete();

        // Create or update the user
        User::updateOrCreate(
            ['email' => 'test@example.com'], // Find user by email
            [
                'name' => 'Test User',
                'password' => Hash::make('Password1234'), // Hash the password
            ]
        );
    }
}
