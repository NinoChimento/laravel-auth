<?php

use Illuminate\Database\Seeder;
use App\Post;
Use App\User;
use Faker\Generator as Faker;
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
            $newPost->title = $faker->title(3);
            $newPost->body = $faker->paragraph(30);
            $newPost->save();
        }
    }
}
