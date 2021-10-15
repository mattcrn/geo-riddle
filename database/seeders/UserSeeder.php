<?php

namespace Database\Seeders;

use App\Models\Riddle;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'TestUser',
            'email' => 'test@bla.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Team 1',
            'email' => 'team_1@grf.com',
            'email_verified_at' => now(),
            'password' => bcrypt('strengGeheim'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Team 2',
            'email' => 'team_2@grf.com',
            'email_verified_at' => now(),
            'password' => bcrypt('sagsNichtWeiter'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Team 3',
            'email' => 'team_3@grf.com',
            'email_verified_at' => now(),
            'password' => bcrypt('kommtNiemandDrauf'),
            'remember_token' => Str::random(10),
        ]);
    }
}
