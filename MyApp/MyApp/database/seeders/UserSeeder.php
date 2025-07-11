<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        User::create([
            'name' => 'Admin',
            'email' => 'admin@store.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);
        User::factory()->count(5)->create();
    }
}
