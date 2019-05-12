<?php

namespace App\Repositories\Contracts;

use App\Entities\Comment;

interface CommentRepository
{
    public function getPostsComments(int $post_id);
    public function save(Comment $comment);
}