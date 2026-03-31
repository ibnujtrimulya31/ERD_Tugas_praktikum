<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LoanDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $loanDetails = [];

        $loanIds = DB::table('loans')->pluck('id')->toArray();
        $bookIds = DB::table('books')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $loanDetails[] = [
                'loan_id' => $faker->randomElement($loanIds),
                'book_id' => $faker->randomElement($bookIds),
                'is_return' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('loan_details')->insert($loanDetails);
    }
}
