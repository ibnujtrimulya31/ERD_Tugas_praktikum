<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $users = [];
        $password = bcrypt('pw');
        for ($i = 1; $i <= 50; $i++) {
            $npm = "5520123058";

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

        
        $bookshelves = [];
        for ($i = 1; $i <= 50; $i++) {
            $bookshelves[] = [
                'code' => strtoupper($faker->bothify('??##')),
                'name' => $faker->word,
            ];
        }

        DB::table('bookshelves')->insert($bookshelves);


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


        $books = [];
        $idBookshelfs = DB::table('bookshelves')->pluck('id')->toArray();
        $idCategories = DB::table('categories')->pluck('id')->toArray();
        for ($i = 1; $i <= 50; $i++) {
            $books[] = [
                'title' => $faker->sentence(rand(1, 4)),
                'author' => $faker->name,
                'year' => $faker->year,
                'publisher' => $faker->company,
                'city' => $faker->city,
                'cover' => $faker->imageUrl(200, 300, 'books', true),
                'bookshelf_id' => $faker->randomElement($idBookshelfs),
                'category_id' => $faker->randomElement($idCategories),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('books')->insert($books);


        $loans = [];
        $NPMuser = DB::table('users')->pluck('npm')->toArray();
        for ($i = 1; $i <= 50; $i++) {
            $loanDate = $faker->dateTimeBetween('-1 years', 'now');

            $loans[] = [
                'user_npm' => $faker->randomElement($NPMuser),
                'loan_at' => $loanDate,
                'return_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('loans')->insert($loans);


        $loanDetails = [];
        $idLoans = DB::table('loans')->pluck('id')->toArray();
        $idBooks = DB::table('books')->pluck('id')->toArray();
        for ($i = 1; $i <= 50; $i++) {
            $loanDetails[] = [
                'loan_id' => $faker->randomElement($idLoans),
                'book_id' => $faker->randomElement($idBooks),
                'is_return' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('loan_details')->insert($loanDetails);


        $returns = [];
        $idLoanDetails = DB::table('loan_details')->pluck('id')->toArray();
        for ($i = 1; $i <= 50; $i++) {
            $returns[] = [
                'loan_detail_id' => $idLoanDetails[$i - 1],
                'charge' => $faker->boolean,
                'amount' => round($faker->numberBetween(0, 25000), -3),
            ];
        }

        DB::table('returns')->insert($returns);
    }
}
