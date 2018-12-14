<?php

use Illuminate\Support\Facades\Route;
use Faker\Factory;

use App\Transformers\ArticleTransformer;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->post('auth/login', 'Auth\AuthController@login');

    Route::group(['middleware' => 'auth:api'], function () use ($router) {
        Route::group(['namespace' => 'Auth'], function () use ($router) {

            $router->get('auth/me', 'AuthController@me');
            $router->post('auth/logout', 'AuthController@logout');

        });
    });
    $router->group(['prefix' => 'posts'], function () use ($router) {

        $router->get('/my', 'PostController@getUserPosts');

        $router->get('/', 'PostController@index');
        $router->get('/{id}', 'PostController@show');
        $router->put('/{id}', 'PostController@update');

        $router->get('/{id}/comments', 'CommentController@index');
        $router->post('/{id}/comments', 'CommentController@store');

    });

});



