<?php

use Illuminate\Database\Seeder;
use App\Post;
Use App\User;
use App\comment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use function GuzzleHttp\Psr7\str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $user = User::inRandomOrder()->first();
            $newPost = new Post;
            $newPost->user_id = $user->id;
            $newPost->title = $faker->word(3);
            $newPost->body = $faker->paragraph(30);
            $newPost->slug = Str::finish(Str::slug($newPost->title, '-'),rand(1,1000));
            $newPost->save();
        }
    }
}
