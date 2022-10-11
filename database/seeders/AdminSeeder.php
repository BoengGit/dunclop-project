<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Bajang',
            'lastname' => 'Riau',
            'username' => 'admin',
            'email' => '',
            'role' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
