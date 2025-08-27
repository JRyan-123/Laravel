<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([

            [
            'name' => 'vendor',
            'email' => 'vendor@example.com',
            'role'  =>  1,
            'password' => Hash::make('1111'),
            ],
            [
            'name' => 'customer',
            'email' => 'customer@example.com',
            'role'  =>  2,
            'password' => Hash::make('1111'),
            ]
            
        ]);
    }
}
