<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Http\Resources\Comment\Comment as CommentResource;
use App\Http\Resources\Comment\CommentCollection;
use App\Repositories\Contracts\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index($post_id)
    {
        return  new CommentCollection($this->commentRepository->getPostsComments($post_id));
    }

    public function store(Request $request,$post_id)
    {

        $comment = $this->commentRepository->save(
            new Comment(
                [
                    'user_id' => $request->input('user_id'),
                    'post_id' => $post_id,
                    'text' => $request->input('text')
                ]
            )
        );
        return new CommentResource($comment);
    }

}
