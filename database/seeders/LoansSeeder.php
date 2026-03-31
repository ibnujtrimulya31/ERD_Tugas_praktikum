<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $loans = [];
        $userNpm = DB::table('users')->pluck('npm')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $loanDate = $faker->dateTimeBetween('-1 years', 'now');

            $loans[] = [
                'user_npm' => $faker->randomElement($userNpm),
                'loan_at' => $loanDate,
                'return_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('loans')->insert($loans);
    }
}
