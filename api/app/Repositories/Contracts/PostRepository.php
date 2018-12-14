<?php

namespace App\Repositories\Contracts;

use App\Entities\Post;

interface PostRepository
{
    public function getPosts();
    public function getByUserId(int $userId);
    public function getPost(int $id);
    public function save(Post $post);
}