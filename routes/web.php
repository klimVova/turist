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
// вывод cafe
Route::group(['namespace' => 'CafeShow', 'prefix' => 'cafes'], function () {
    Route::get('/', IndexController::class)->name('cafeShow.index');
    Route::get('/{cafeCard}/show', ShowController::class)->name('cafeShow.show');
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
    Route::group(['namespace' => 'Tag','prefix' => 'tags'], function () {
        Route::get('/', IndexController::class)->name('hostel.tag.index');
        Route::get('/create', CreateController::class)->name('hostel.tag.create');
        Route::post('/', StoreController::class)->name('hostel.tag.store');
        Route::get('/{hostelTag}', ShowController::class)->name('hostel.tag.show');
        Route::get('/{hostelTag}/edit', EditController::class)->name('hostel.tag.edit');
        Route::patch('/{hostelTag}', UpdateController::class)->name('hostel.tag.update');
        Route::delete('/{hostelTag}', DeleteController::class)->name('hostel.tag.delete');
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
    Route::group(['namespace' => 'city', 'prefix' => 'cities'], function () {
        Route::get('/', IndexController::class)->name('admin.city.index');
        Route::get('/create', CreateController::class)->name('admin.city.create');
        Route::post('/', StoreController::class)->name('admin.city.store');
        Route::get('/{city}', ShowController::class)->name('admin.city.show');
        Route::get('/{city}/edit', EditController::class)->name('admin.city.edit');
        Route::patch('/{city}', UpdateController::class)->name('admin.city.update');
        Route::delete('/{city}', DeleteController::class)->name('admin.city.delete');
    });
    Route::group(['namespace' => 'republic', 'prefix' => 'republics'], function () {
        Route::get('/', IndexController::class)->name('admin.republic.index');
        Route::get('/create', CreateController::class)->name('admin.republic.create');
        Route::post('/', StoreController::class)->name('admin.republic.store');
        Route::get('/{republic}', ShowController::class)->name('admin.republic.show');
        Route::get('/{republic}/edit', EditController::class)->name('admin.republic.edit');
        Route::patch('/{republic}', UpdateController::class)->name('admin.republic.update');
        Route::delete('/{republic}', DeleteController::class)->name('admin.republic.delete');
    });
    Route::group(['namespace' => 'district', 'prefix' => 'districts'], function () {
        Route::get('/', IndexController::class)->name('admin.district.index');
        Route::get('/create', CreateController::class)->name('admin.district.create');
        Route::post('/', StoreController::class)->name('admin.district.store');
        Route::get('/{district}', ShowController::class)->name('admin.district.show');
        Route::get('/{district}/edit', EditController::class)->name('admin.district.edit');
        Route::patch('/{district}', UpdateController::class)->name('admin.district.update');
        Route::delete('/{district}', DeleteController::class)->name('admin.district.delete');
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


//Restaurants-cafes Cafe
Route::group(['namespace' => 'Cafe', 'prefix' => 'cafe', 'middleware' => ['auth', 'cafe' , 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('cafe.main.index');
    });
    Route::group(['namespace' => 'Card','prefix' => 'cards'],  function () {
        Route::get('/', IndexController::class)->name('cafe.card.index');
        Route::get('/create', CreateController::class)->name('cafe.card.create');
        Route::post('/', StoreController::class)->name('cafe.card.store');
        Route::get('/{cafeCard}', ShowController::class)->name('cafe.card.show');
        Route::get('/{cafeCard}/edit', EditController::class)->name('cafe.card.edit');
        Route::patch('/{cafeCard}', UpdateController::class)->name('cafe.card.update');
        Route::delete('/{cafeCard}', DeleteController::class)->name('cafe.card.delete');
    });
    Route::group(['namespace' => 'Time','prefix' => 'times'],  function () {
        Route::get('/', IndexController::class)->name('cafe.time.index');
        Route::get('/create', CreateController::class)->name('cafe.time.create');
        Route::post('/', StoreController::class)->name('cafe.time.store');
        Route::get('/{cafeTime}', ShowController::class)->name('cafe.time.show');
        Route::get('/{cafeTime}/edit', EditController::class)->name('cafe.time.edit');
        Route::patch('/{cafeTime}', UpdateController::class)->name('cafe.time.update');
        Route::delete('/{cafeTime}', DeleteController::class)->name('cafe.time.delete');
    });
    Route::group(['namespace' => 'TodoList','prefix' => 'todolist'],  function () {
        Route::get('/', IndexController::class)->name('cafe.todolist.index');
        Route::get('/create', CreateController::class)->name('cafe.todolist.create');
        Route::post('/', StoreController::class)->name('cafe.todolist.store');
        Route::get('/{cafeTodoList}', ShowController::class)->name('cafe.todolist.show');
        Route::get('/{cafeTodoList}/edit', EditController::class)->name('cafe.todolist.edit');
        Route::patch('/{cafeTodoList}', UpdateController::class)->name('cafe.todolist.update');
        Route::delete('/{cafeTodoList}', DeleteController::class)->name('cafe.todolist.delete');
        Route::get('/{cafeTodoList}/item/',ItemController::class)->name('cafe.todolist.item');
        Route::post('/{cafeTodoList}/item/',ItemStoreController::class)->name('cafe.todolist.item_store');
        Route::delete('{cafeTodoList}/item/',ItemRemoveController::class, 'remove')->name('cafe.todolist.item_remove');
    });
    Route::group(['namespace' => 'TodoItem','prefix' => 'todoitem'],  function () {;
        Route::get('/{cafeTodoItem}/edit', EditController::class)->name('cafe.todoitem.edit');
        Route::patch('/{cafeTodoItem}', UpdateController::class)->name('cafe.todoitem.update');
        Route::get('/{cafeTodoItem}/product/',ProductController::class)->name('cafe.todoitem.product');
        Route::post('/{cafeTodoItem}/product/',ProductStoreController::class)->name('cafe.todoitem.product_store');
        Route::delete('{cafeTodoItem}/product/',ProductRemoveController::class, 'remove')->name('cafe.todoitem.product_remove');
    });
    Route::group(['namespace' => 'TodoProduct','prefix' => 'todoproduct'],  function () {;
        Route::get('/{cafeTodoProduct}/edit', EditController::class)->name('cafe.todoproduct.edit');
        Route::patch('/{cafeTodoProduct}', UpdateController::class)->name('cafe.todoproduct.update');
    });
});

//Medical
Route::group(['namespace' => 'Medical', 'prefix' => 'medical', 'middleware' => ['auth', 'medical' , 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('medical.main.index');
    });
    Route::group(['namespace' => 'Card','prefix' => 'cards'],  function () {
        Route::get('/', IndexController::class)->name('medical.card.index');
        Route::get('/create', CreateController::class)->name('medical.card.create');
        Route::post('/', StoreController::class)->name('medical.card.store');
        Route::get('/{medicalCard}', ShowController::class)->name('medical.card.show');
        Route::get('/{medicalCard}/edit', EditController::class)->name('medical.card.edit');
        Route::patch('/{medicalCard}', UpdateController::class)->name('medical.card.update');
        Route::delete('/{medicalCard}', DeleteController::class)->name('medical.card.delete');
    });
    Route::group(['namespace' => 'Time','prefix' => 'times'],  function () {
        Route::get('/', IndexController::class)->name('medical.time.index');
        Route::get('/create', CreateController::class)->name('medical.time.create');
        Route::post('/', StoreController::class)->name('medical.time.store');
        Route::get('/{medicalTime}', ShowController::class)->name('medical.time.show');
        Route::get('/{medicalTime}/edit', EditController::class)->name('medical.time.edit');
        Route::patch('/{medicalTime}', UpdateController::class)->name('medical.time.update');
        Route::delete('/{medicalTime}', DeleteController::class)->name('medical.time.delete');
    });
    Route::group(['namespace' => 'TodoList','prefix' => 'todolist'],  function () {
        Route::get('/', IndexController::class)->name('medical.todolist.index');
        Route::get('/create', CreateController::class)->name('medical.todolist.create');
        Route::post('/', StoreController::class)->name('medical.todolist.store');
        Route::get('/{medicalTodoList}', ShowController::class)->name('medical.todolist.show');
        Route::get('/{medicalTodoList}/edit', EditController::class)->name('medical.todolist.edit');
        Route::patch('/{medicalTodoList}', UpdateController::class)->name('medical.todolist.update');
        Route::delete('/{medicalTodoList}', DeleteController::class)->name('medical.todolist.delete');
        Route::get('/{medicalTodoList}/item/',ItemController::class)->name('medical.todolist.item');
        Route::post('/{medicalTodoList}/item/',ItemStoreController::class)->name('medical.todolist.item_store');
        Route::delete('{medicalTodoList}/item/',ItemRemoveController::class, 'remove')->name('medical.todolist.item_remove');
    });
    Route::group(['namespace' => 'TodoItem','prefix' => 'todoitem'],  function () {;
        Route::get('/{medicalTodoItem}/edit', EditController::class)->name('medical.todoitem.edit');
        Route::patch('/{medicalTodoItem}', UpdateController::class)->name('medical.todoitem.update');
        Route::get('/{medicalTodoItem}/product/',ProductController::class)->name('medical.todoitem.product');
        Route::post('/{medicalTodoItem}/product/',ProductStoreController::class)->name('medical.todoitem.product_store');
        Route::delete('{medicalTodoItem}/product/',ProductRemoveController::class, 'remove')->name('medical.todoitem.product_remove');
    });
    Route::group(['namespace' => 'TodoProduct','prefix' => 'todoproduct'],  function () {;
        Route::get('/{medicalTodoProduct}/edit', EditController::class)->name('medical.todoproduct.edit');
        Route::patch('/{medicalTodoProduct}', UpdateController::class)->name('medical.todoproduct.update');
    });
});

//Spa
Route::group(['namespace' => 'Spa', 'prefix' => 'spa', 'middleware' => ['auth', 'spa' , 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('spa.main.index');
    });
    Route::group(['namespace' => 'Card','prefix' => 'cards'],  function () {
        Route::get('/', IndexController::class)->name('spa.card.index');
        Route::get('/create', CreateController::class)->name('spa.card.create');
        Route::post('/', StoreController::class)->name('spa.card.store');
        Route::get('/{spaCard}', ShowController::class)->name('spa.card.show');
        Route::get('/{spaCard}/edit', EditController::class)->name('spa.card.edit');
        Route::patch('/{spaCard}', UpdateController::class)->name('spa.card.update');
        Route::delete('/{spaCard}', DeleteController::class)->name('spa.card.delete');
    });
    Route::group(['namespace' => 'Time','prefix' => 'times'],  function () {
        Route::get('/', IndexController::class)->name('spa.time.index');
        Route::get('/create', CreateController::class)->name('spa.time.create');
        Route::post('/', StoreController::class)->name('spa.time.store');
        Route::get('/{spaTime}', ShowController::class)->name('spa.time.show');
        Route::get('/{spaTime}/edit', EditController::class)->name('spa.time.edit');
        Route::patch('/{spaTime}', UpdateController::class)->name('spa.time.update');
        Route::delete('/{spaTime}', DeleteController::class)->name('spa.time.delete');
    });
    Route::group(['namespace' => 'TodoList','prefix' => 'todolist'],  function () {
        Route::get('/', IndexController::class)->name('spa.todolist.index');
        Route::get('/create', CreateController::class)->name('spa.todolist.create');
        Route::post('/', StoreController::class)->name('spa.todolist.store');
        Route::get('/{spaTodoList}', ShowController::class)->name('spa.todolist.show');
        Route::get('/{spaTodoList}/edit', EditController::class)->name('spa.todolist.edit');
        Route::patch('/{spaTodoList}', UpdateController::class)->name('spa.todolist.update');
        Route::delete('/{spaTodoList}', DeleteController::class)->name('spa.todolist.delete');
        Route::get('/{spaTodoList}/item/',ItemController::class)->name('spa.todolist.item');
        Route::post('/{spaTodoList}/item/',ItemStoreController::class)->name('spa.todolist.item_store');
        Route::delete('{spaTodoList}/item/',ItemRemoveController::class, 'remove')->name('spa.todolist.item_remove');
    });
    Route::group(['namespace' => 'TodoItem','prefix' => 'todoitem'],  function () {;
        Route::get('/{spaTodoItem}/edit', EditController::class)->name('spa.todoitem.edit');
        Route::patch('/{spaTodoItem}', UpdateController::class)->name('spa.todoitem.update');
        Route::get('/{spaTodoItem}/product/',ProductController::class)->name('spa.todoitem.product');
        Route::post('/{spaTodoItem}/product/',ProductStoreController::class)->name('spa.todoitem.product_store');
        Route::delete('{spaTodoItem}/product/',ProductRemoveController::class, 'remove')->name('spa.todoitem.product_remove');
    });
    Route::group(['namespace' => 'TodoProduct','prefix' => 'todoproduct'],  function () {;
        Route::get('/{spaTodoProduct}/edit', EditController::class)->name('spa.todoproduct.edit');
        Route::patch('/{spaTodoProduct}', UpdateController::class)->name('spa.todoproduct.update');
    });
});

Auth::routes();

