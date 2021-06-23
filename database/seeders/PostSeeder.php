<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($userid)
    {
        $faker = \Faker\Factory::create();

        DB::table('posts')->insert([
            'title' => $faker->word,
            'excerpt' => $faker->sentence,
            'body' => $faker->text,
            'user_id' => $userid
        ]);
    }
}
