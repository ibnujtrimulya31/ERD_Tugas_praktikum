<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookshelvesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $bookshelves = [];

        for ($i = 1; $i <= 50; $i++) {
            $bookshelves[] = [
                'code' => strtoupper($faker->bothify('??##')),
                'name' => $faker->word,
            ];
        }

        DB::table('bookshelves')->insert($bookshelves);
    }
}
