<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'System Administrator',
            'email' => 'info@biotechusa.com',
            'password' => Hash::make('aA123456'),
            'is_active' => 1,
            'is_admin' => 1,
        ]);
    }
}
