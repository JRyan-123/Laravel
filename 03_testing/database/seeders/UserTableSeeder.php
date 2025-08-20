<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            
            [
                'name'  =>  'admin',
                'role'  =>  'admin',
                'phone' =>  '09123',
                'email' =>  'admin@gmail.com',
                'password'  =>  Hash::make('1111')
            ],

            [
                'name'  =>  'agent',
                'role'  =>  'agent',
                'phone' =>  '09123',
                'email' =>  'agent@gmail.com',
                'password'  =>  Hash::make('1111')
            ],

            [
                'name'  =>  'user',
                'role'  =>  'user',
                'phone' =>  '09123',
                'email' =>  'user@gmail.com',
                'password'  =>  Hash::make('1111')
            ],

        ]);
    }
}
