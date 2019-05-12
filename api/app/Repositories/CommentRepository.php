<?php

namespace App\Repositories;

use App\Entities\Comment;
use \App\Repositories\Contracts\CommentRepository as CommentRepositoryContract;


class CommentRepository implements CommentRepositoryContract
{
     public function getPostsComments(int $post_id)
     {
         return Comment::where('post_id',$post_id)->get();
     }
     public function save(Comment $comment): Comment
     {
         $comment->save();
         return $comment;
     }
}