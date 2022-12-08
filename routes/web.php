<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

// вывод постов
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/{post}/show', ShowController::class)->name('post.show');
});
// вывод отелей
Route::group(['namespace' => 'HostelShow', 'prefix' => 'hostels'], function () {
    Route::get('/', IndexController::class)->name('hostelShow.index');
    Route::get('/{hostelCard}/show/', ShowController::class)->name('hostelShow.show');
    Route::get('/{hostelPost}/images/', ImagesController::class)->name('hostelShow.images');
});
//HOSTEL
Route::group(['namespace' => 'Hostel', 'prefix' => 'hostel', 'middleware' => ['auth', 'hostel' , 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('hostel.main.index');
    });
    Route::group(['namespace' => 'Post','prefix' => 'posts'],  function () {
        Route::get('/', IndexController::class)->name('hostel.post.index');
        Route::get('/create', CreateController::class)->name('hostel.post.create');
        Route::post('/', StoreController::class)->name('hostel.post.store');
        Route::get('/{hostelPost}/edit', EditController::class)->name('hostel.post.edit');
        Route::patch('/{hostelPost}', UpdateController::class)->name('hostel.post.update');
        Route::delete('/{hostelPost}', DeleteController::class)->name('hostel.post.delete');
        Route::get('/{hostelPost}/image/',ImageController::class)->name('hostel.post.image');
        Route::post('/{hostelPost}/image/',ImageStoreController::class)->name('hostel.post.image_store');
        Route::delete('{hostelPost}/image/',ImageRemoveController::class, 'remove')->name('hostel.post.image_remove');
    });
    Route::group(['namespace' => 'Category','prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('hostel.category.index');
        Route::get('/create', CreateController::class)->name('hostel.category.create');
        Route::post('/', StoreController::class)->name('hostel.category.store');
        Route::get('/{hostelCategory}', ShowController::class)->name('hostel.category.show');
        Route::get('/{hostelCategory}/edit', EditController::class)->name('hostel.category.edit');
        Route::patch('/{hostelCategory}', UpdateController::class)->name('hostel.category.update');
        Route::delete('/{hostelCategory}', DeleteController::class)->name('hostel.category.delete');
    });
    Route::group(['namespace' => 'Card','prefix' => 'cards'],  function () {
        Route::get('/', IndexController::class)->name('hostel.card.index');
        Route::get('/create', CreateController::class)->name('hostel.card.create');
        Route::post('/', StoreController::class)->name('hostel.card.store');
        Route::get('/{hostelCard}', ShowController::class)->name('hostel.card.show');
        Route::get('/{hostelCard}/edit', EditController::class)->name('hostel.card.edit');
        Route::patch('/{hostelCard}', UpdateController::class)->name('hostel.card.update');
        Route::delete('/{hostelCard}', DeleteController::class)->name('hostel.card.delete');
    });
});


//ADMIN
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', IndexController::class)->name('admin.post.index');
        Route::get('/create', CreateController::class)->name('admin.post.create');
        Route::post('/', StoreController::class)->name('admin.post.store');
        Route::get('/{post}', ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');
        Route::get('/{post}/image/',ImageController::class)->name('admin.post.image');
        Route::post('/{post}/image/',ImageStoreController::class)->name('admin.post.image_store');
        Route::delete('{post}/image/',ImageRemoveController::class, 'remove')->name('admin.post.image_remove');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', IndexController::class)->name('admin.tag.index');
        Route::get('/create', CreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/create', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
    });
});


//USER
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['auth', 'user', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('user.main.index');
    });
});
Auth::routes();

