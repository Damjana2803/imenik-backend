<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::factory()->create([
            'name'     => 'Admin Demo',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
