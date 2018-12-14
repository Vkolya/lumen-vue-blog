<?php

use Illuminate\Database\Seeder;
use App\Entities\Post;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        foreach (\App\Entities\User::all() as $user) {
            $user->posts()->saveMany(factory(\App\Entities\Post::class,25)->make(['user_id' => $user->id]))->each(function ($post) use ($user) {
                $post->comments()->saveMany(factory(\App\Entities\Comment::class, 1)->make(['user_id' => $user->id]));
            });
        };
    }
}