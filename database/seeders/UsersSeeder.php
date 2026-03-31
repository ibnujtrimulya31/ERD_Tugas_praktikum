<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = [];

        $password = bcrypt('password');
        for ($i = 1; $i <= 50; $i++) {
            $urutan   = str_pad($i, 3, '0', STR_PAD_LEFT);
            $npm      = "5520123{$urutan}";

            $users[] = [
                'npm' => $npm,
                'username' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
