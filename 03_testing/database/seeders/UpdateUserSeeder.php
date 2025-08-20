<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use DB;

class UpdateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        //faker


        $users = DB::table('users')->get();
        //get users


        foreach($users as $user) {
            DB::table('users')
            ->where('id', $user->id)
            ->update([
                'photo' => $faker->imageUrl(150, 150,'people', true)
            ]);
        }

    }
}
