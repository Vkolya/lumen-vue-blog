<?php

namespace App\Repositories;

use App\Repositories\Contracts\PostRepository as PostRepositoryContract;
use App\Entities\Post;

class PostRepository implements PostRepositoryContract
{
    const LIMIT = 12;

    public function getPosts()
    {
        return Post::paginate(self::LIMIT);
    }
    public function getByUserId(int $userId)
    {
        return Post::where('user_id',$userId)->paginate();
    }

    public function getPost(int $id): Post
    {
        return Post::find($id);
    }

    public function save(Post $post): Post
    {
        $post->save();
        return $post;
    }
}