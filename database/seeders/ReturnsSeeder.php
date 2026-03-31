<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReturnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $returns = [];

        $loanDetailIds = DB::table('loan_details')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $returns[] = [
                'loan_detail_id' => $loanDetailIds[$i - 1],
                'charge' => $faker->boolean,
                'amount' => round($faker->numberBetween(0, 25000), -3),
            ];
        }

        DB::table('returns')->insert($returns);
    }
}
