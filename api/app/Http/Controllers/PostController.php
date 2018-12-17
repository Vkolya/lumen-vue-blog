<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Http\Resources\Post\Post as PostResource;
use App\Http\Resources\Post\PostCollection;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
         $this->postRepository = $postRepository;
    }

    public function index()
    {
        return  new PostCollection($this->postRepository->getPosts());
    }
    public function getUserPosts()
    {
        return  new PostCollection($this->postRepository->getByUserId(Auth::id()));
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return new PostResource($this->postRepository->getPost($id));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::user()->can('update', $post)) {
            $post->title = $request->input('title');
            $post->text = $request->input('text');
            return new PostResource($this->postRepository->save($post));
        }else {
            return response()->json(['error' => 'You are not allowed to update this post.'],403);
        }
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if (Auth::user()->can('delete', $post)) {
            $this->postRepository->deleteById($id);
        }else {
            return response()->json(['error' => 'You are not allowed to delete this post.'],403);
        }
    }
}
