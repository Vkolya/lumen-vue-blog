<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\Contracts\CommentRepository as CommentRepositoryInterface;
use App\Repositories\Contracts\PostRepository as PostRepositoryContract;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryContract::class, PostRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }
}
