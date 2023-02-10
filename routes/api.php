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



Route::post('/spa', \App\Http\Controllers\API\Spa\IndexController::class);
Route::get('/spa/filters', \App\Http\Controllers\API\Spa\FilterListController::class);
Route::get('/spa/{spaCard}', \App\Http\Controllers\API\Spa\ShowController::class);
Route::get('/spatimes', \App\Http\Controllers\API\Spa\TimeController::class);
Route::get('/spalists', \App\Http\Controllers\API\Spa\ListController::class);
Route::get('/spaitems', \App\Http\Controllers\API\Spa\ItemController::class);
Route::get('/spaproducts', \App\Http\Controllers\API\Spa\ProductController::class);

Route::post('/cafes', \App\Http\Controllers\API\Cafe\IndexController::class);
Route::get('/cafes/filters', \App\Http\Controllers\API\Cafe\FilterListController::class);
Route::get('/cafe/{cafeCard}', \App\Http\Controllers\API\Cafe\ShowController::class);
Route::get('/cafetimes', \App\Http\Controllers\API\Cafe\TimeController::class);
Route::get('/cafelists', \App\Http\Controllers\API\Cafe\ListController::class);
Route::get('/cafeitems', \App\Http\Controllers\API\Cafe\ItemController::class);
Route::get('/cafeproducts', \App\Http\Controllers\API\Cafe\ProductController::class);