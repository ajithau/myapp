<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
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

        $postId = DB::table('posts')->insertGetId([
            'title' => $faker->word,
            'excerpt' => $faker->sentence,
            'body' => $faker->text,
            'user_id' => $userid
        ]);

        Excel::import(new PostsImport($postId), storage_path('app/public/comment/post.xlsx') );
    }
}
