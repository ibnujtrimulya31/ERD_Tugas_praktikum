<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $books = [];
        $bookshelfIds = DB::table('bookshelves')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $books[] = [
                'title' => $faker->sentence(rand(1, 4)),
                'author' => $faker->name,
                'year' => $faker->year,
                'publisher' => $faker->company,
                'city' => $faker->city,
                'cover' => $faker->imageUrl(200, 300, 'books', true),
                'bookshelf_id' => $faker->randomElement($bookshelfIds),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('books')->insert($books);
    }
}
