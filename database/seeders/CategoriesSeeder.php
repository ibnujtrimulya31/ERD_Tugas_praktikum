<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = [];

        for ($i = 1; $i <= 50; $i++) {
            $categories[] = [
                'category' => $faker->randomElement([
                    'Novel', 'Komik', 'Teknik', 'Sejarah', 'Agama', 'Sains', 'Fiksi', 'Aksi', 'Romantis',
                    'Drama', 'Komedi', 'Biografi', 'Self Improvement', 'Fantasi', 'Misteri', 'Horror'
                ]),
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
