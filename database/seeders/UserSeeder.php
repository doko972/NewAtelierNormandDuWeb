<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'contact@ateliernormandduweb.fr'],
            [
                'name' => 'David GROUGI',
                'password' => bcrypt('changeme'), // à changer au premier login
                'role' => 'admin',
                'locale' => 'fr',
                'email_verified_at' => now(),
            ]
        );
    }
}
