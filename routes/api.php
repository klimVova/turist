<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->id;
});

Route::get('/posts', \App\Http\Controllers\API\Blog\IndexController::class);
Route::get('/posts/{post}', \App\Http\Controllers\API\Blog\ShowController::class);

Route::get('/users/filters', \App\Http\Controllers\API\User\FilterListController::class);
Route::get('/users', \App\Http\Controllers\API\User\IndexController::class);

Route::post('/medicals', \App\Http\Controllers\API\Medical\IndexController::class);
Route::get('/medicals/filters', \App\Http\Controllers\API\Medical\FilterListController::class);
Route::get('/medicals/{medicalCard}', \App\Http\Controllers\API\Medical\ShowController::class);
Route::get('/time', \App\Http\Controllers\API\Medical\TimeController::class);
Route::get('/list', \App\Http\Controllers\API\Medical\ListController::class);
Route::get('/item', \App\Http\Controllers\API\Medical\ItemController::class);
Route::get('/product', \App\Http\Controllers\API\Medical\ProductController::class);
Route::post('medicals/{medicalCard}/comments', \App\Http\Controllers\API\Medical\CommentController::class);
Route::post('/show/{medicalCard}/comments', \App\Http\Controllers\API\Medical\ShowCommentController::class);
Route::delete('/medicals/comment/{id}', \App\Http\Controllers\API\Medical\DeleteCommentController::class);
Route::get('/medicalAction', \App\Http\Controllers\API\Medical\ActionController::class);


Route::post('/spa', \App\Http\Controllers\API\Spa\IndexController::class);
Route::get('/spa/filters', \App\Http\Controllers\API\Spa\FilterListController::class);
Route::get('/spa/{spaCard}', \App\Http\Controllers\API\Spa\ShowController::class);
Route::get('/spatimes', \App\Http\Controllers\API\Spa\TimeController::class);
Route::get('/spalists', \App\Http\Controllers\API\Spa\ListController::class);
Route::get('/spaitems', \App\Http\Controllers\API\Spa\ItemController::class);
Route::get('/spaproducts', \App\Http\Controllers\API\Spa\ProductController::class);
Route::post('/spa/{spaCard}/comments', \App\Http\Controllers\API\Spa\CommentController::class);
Route::post('/spa/show/{spaCard}/comments', \App\Http\Controllers\API\Spa\ShowCommentController::class);
Route::delete('/spa/comment/{id}', \App\Http\Controllers\API\Spa\DeleteCommentController::class);
Route::get('/spaAction', \App\Http\Controllers\API\Spa\ActionController::class);

Route::post('/cafes', \App\Http\Controllers\API\Cafe\IndexController::class);
Route::get('/cafes/filters', \App\Http\Controllers\API\Cafe\FilterListController::class);
Route::get('/cafe/{cafeCard}', \App\Http\Controllers\API\Cafe\ShowController::class);
Route::get('/cafetimes', \App\Http\Controllers\API\Cafe\TimeController::class);
Route::get('/cafelists', \App\Http\Controllers\API\Cafe\ListController::class);
Route::get('/cafeitems', \App\Http\Controllers\API\Cafe\ItemController::class);
Route::get('/cafeproducts', \App\Http\Controllers\API\Cafe\ProductController::class);
Route::post('/cafe/{cafeCard}/comments', \App\Http\Controllers\API\Cafe\CommentController::class);
Route::post('/cafe/show/{cafeCard}/comments', \App\Http\Controllers\API\Cafe\ShowCommentController::class);
Route::delete('/cafe/comment/{id}', \App\Http\Controllers\API\Cafe\DeleteCommentController::class);
Route::get('/cafeAction', \App\Http\Controllers\API\Cafe\ActionController::class);

Route::post('/hostels', \App\Http\Controllers\API\Hostel\IndexController::class);
Route::get('/hostels/filters', \App\Http\Controllers\API\Hostel\FilterListController::class);
Route::get('/hostel/{hostelCard}', \App\Http\Controllers\API\Hostel\ShowController::class);
Route::get('/hostelAction', \App\Http\Controllers\API\Hostel\ActionController::class);
Route::get('/hostelServic', \App\Http\Controllers\API\Hostel\ServicController::class);
Route::get('/hostelCategories', \App\Http\Controllers\API\Hostel\CategoryController::class);
Route::get('/hostelPost', \App\Http\Controllers\API\Hostel\PostController::class);
Route::post('/hostel/{hostelCard}/comments', \App\Http\Controllers\API\Hostel\CommentController::class);
Route::post('/hostelShow/{hostelCard}/comments', \App\Http\Controllers\API\Hostel\ShowCommentController::class);
Route::delete('/hostel/comment/{id}', \App\Http\Controllers\API\Hostel\DeleteCommentController::class);


Route::post('/sanatoriums', \App\Http\Controllers\API\Sanatorium\IndexController::class);
Route::get('/sanatoriums/filters', \App\Http\Controllers\API\Sanatorium\FilterListController::class);
Route::get('/sanatorium/{sanatoriumCard}', \App\Http\Controllers\API\Sanatorium\ShowController::class);
Route::get('/sanatoriumAction', \App\Http\Controllers\API\Sanatorium\ActionController::class);
Route::get('/sanatoriumServic', \App\Http\Controllers\API\Sanatorium\ServicController::class);
Route::get('/sanatoriumCategories', \App\Http\Controllers\API\Sanatorium\CategoryController::class);
Route::get('/sanatoriumPost', \App\Http\Controllers\API\Sanatorium\PostController::class);
Route::post('/sanatorium/{sanatoriumCard}/comments', \App\Http\Controllers\API\Sanatorium\CommentController::class);
Route::post('/sanatoriumShow/{sanatoriumCard}/comments', \App\Http\Controllers\API\Sanatorium\ShowCommentController::class);
Route::delete('/sanatorium/comment/{id}', \App\Http\Controllers\API\Sanatorium\DeleteCommentController::class);
Route::get('/sanatoriumLists', \App\Http\Controllers\API\Sanatorium\ListController::class);
Route::get('/sanatoriumItems', \App\Http\Controllers\API\Sanatorium\ItemController::class);
Route::get('/sanatoriumProducts', \App\Http\Controllers\API\Sanatorium\ProductController::class);