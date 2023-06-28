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
Route::group(['prefix' => 'main'], function () {

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
    Route::group(['namespace' => 'Hostel', 'prefix' => 'hostel', 'middleware' => ['auth', 'hostel', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('hostel.main.index');
        });
        Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            Route::get('/', IndexController::class)->name('hostel.post.index');
            Route::get('/create', CreateController::class)->name('hostel.post.create');
            Route::post('/', StoreController::class)->name('hostel.post.store');
            Route::get('/{hostelPost}/edit', EditController::class)->name('hostel.post.edit');
            Route::patch('/{hostelPost}', UpdateController::class)->name('hostel.post.update');
            Route::delete('/{hostelPost}', DeleteController::class)->name('hostel.post.delete');
            Route::get('/{hostelPost}/image/', ImageController::class)->name('hostel.post.image');
            Route::post('/{hostelPost}/image/', ImageStoreController::class)->name('hostel.post.image_store');
            Route::delete('{hostelPost}/image/', ImageRemoveController::class, 'remove')->name('hostel.post.image_remove');
        });
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', IndexController::class)->name('hostel.category.index');
            Route::get('/create', CreateController::class)->name('hostel.category.create');
            Route::post('/', StoreController::class)->name('hostel.category.store');
            Route::get('/{hostelCategory}', ShowController::class)->name('hostel.category.show');
            Route::get('/{hostelCategory}/edit', EditController::class)->name('hostel.category.edit');
            Route::patch('/{hostelCategory}', UpdateController::class)->name('hostel.category.update');
            Route::delete('/{hostelCategory}', DeleteController::class)->name('hostel.category.delete');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('hostel.tag.index');
            Route::get('/create', CreateController::class)->name('hostel.tag.create');
            Route::post('/', StoreController::class)->name('hostel.tag.store');
            Route::get('/{hostelTag}', ShowController::class)->name('hostel.tag.show');
            Route::get('/{hostelTag}/edit', EditController::class)->name('hostel.tag.edit');
            Route::patch('/{hostelTag}', UpdateController::class)->name('hostel.tag.update');
            Route::delete('/{hostelTag}', DeleteController::class)->name('hostel.tag.delete');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('hostel.card.index');
            Route::get('/create', CreateController::class)->name('hostel.card.create');
            Route::post('/', StoreController::class)->name('hostel.card.store');
            Route::get('/{hostelCard}', ShowController::class)->name('hostel.card.show');
            Route::get('/{hostelCard}/edit', EditController::class)->name('hostel.card.edit');
            Route::patch('/{hostelCard}', UpdateController::class)->name('hostel.card.update');
            Route::delete('/{hostelCard}', DeleteController::class)->name('hostel.card.delete');
            Route::get('/{hostelCard}/image/', ImageController::class)->name('hostel.card.image');
            Route::post('/{hostelCard}/image/', ImageStoreController::class)->name('hostel.card.image_store');
            Route::delete('{hostelCard}/image/', ImageRemoveController::class)->name('hostel.card.image_remove');
        });
        Route::group(['namespace' => 'TagCard', 'prefix' => 'cardTags'], function () {
            Route::get('/', IndexController::class)->name('hostel.tagCard.index');
            Route::get('/create', CreateController::class)->name('hostel.tagCard.create');
            Route::post('/', StoreController::class)->name('hostel.tagCard.store');
            Route::get('/{hostelCardTag}', ShowController::class)->name('hostel.tagCard.show');
            Route::get('/{hostelCardTag}/edit', EditController::class)->name('hostel.tagCard.edit');
            Route::patch('/{hostelCardTag}', UpdateController::class)->name('hostel.tagCard.update');
            Route::delete('/{hostelCardTag}', DeleteController::class)->name('hostel.tagCard.delete');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('hostel.action.index');
            Route::get('/create', CreateController::class)->name('hostel.action.create');
            Route::post('/', StoreController::class)->name('hostel.action.store');
            Route::get('/{hostelAction}', ShowController::class)->name('hostel.action.show');
            Route::get('/{hostelAction}/edit', EditController::class)->name('hostel.action.edit');
            Route::patch('/{hostelAction}', UpdateController::class)->name('hostel.action.update');
            Route::delete('/{hostelAction}', DeleteController::class)->name('hostel.action.delete');
        });
        Route::group(['namespace' => 'Servic', 'prefix' => 'servic'], function () {
            Route::get('/', IndexController::class)->name('hostel.servic.index');
            Route::get('/create', CreateController::class)->name('hostel.servic.create');
            Route::post('/', StoreController::class)->name('hostel.servic.store');
            Route::get('/{hostelServic}', ShowController::class)->name('hostel.servic.show');
            Route::get('/{hostelServic}/edit', EditController::class)->name('hostel.servic.edit');
            Route::patch('/{hostelServic}', UpdateController::class)->name('hostel.servic.update');
            Route::delete('/{hostelServic}', DeleteController::class)->name('hostel.servic.delete');
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
            Route::get('/{post}/image/', ImageController::class)->name('admin.post.image');
            Route::post('/{post}/image/', ImageStoreController::class)->name('admin.post.image_store');
            Route::delete('{post}/image/', ImageRemoveController::class, 'remove')->name('admin.post.image_remove');
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
        Route::group(['namespace' => 'Type', 'prefix' => 'types'], function () {
            Route::get('/', IndexController::class)->name('admin.type.index');
            Route::get('/create', CreateController::class)->name('admin.type.create');
            Route::post('/', StoreController::class)->name('admin.type.store');
            Route::get('/{type}', ShowController::class)->name('admin.type.show');
            Route::get('/{type}/edit', EditController::class)->name('admin.type.edit');
            Route::patch('/{type}', UpdateController::class)->name('admin.type.update');
            Route::delete('/{type}', DeleteController::class)->name('admin.type.delete');
        });
        Route::group(['namespace' => 'City', 'prefix' => 'cities'], function () {
            Route::get('/', IndexController::class)->name('admin.city.index');
            Route::get('/create', CreateController::class)->name('admin.city.create');
            Route::post('/', StoreController::class)->name('admin.city.store');
            Route::get('/{city}', ShowController::class)->name('admin.city.show');
            Route::get('/{city}/edit', EditController::class)->name('admin.city.edit');
            Route::patch('/{city}', UpdateController::class)->name('admin.city.update');
            Route::delete('/{city}', DeleteController::class)->name('admin.city.delete');
        });
        Route::group(['namespace' => 'Republic', 'prefix' => 'republics'], function () {
            Route::get('/', IndexController::class)->name('admin.republic.index');
            Route::get('/create', CreateController::class)->name('admin.republic.create');
            Route::post('/', StoreController::class)->name('admin.republic.store');
            Route::get('/{republic}', ShowController::class)->name('admin.republic.show');
            Route::get('/{republic}/edit', EditController::class)->name('admin.republic.edit');
            Route::patch('/{republic}', UpdateController::class)->name('admin.republic.update');
            Route::delete('/{republic}', DeleteController::class)->name('admin.republic.delete');
        });
        Route::group(['namespace' => 'District', 'prefix' => 'districts'], function () {
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

        Route::group(['namespace' => 'Baner', 'prefix' => 'baners'], function () {
            Route::get('/', IndexController::class)->name('admin.baner.index');
            Route::post('/image/', ImageStoreController::class)->name('admin.baner.image_store');
            Route::delete('{baner}/image/', ImageRemoveController::class, 'remove')->name('admin.baner.image_remove');
        });

    });


//USER
    Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['auth', 'user', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('user.main.index');
            Route::get('/success', StatusController::class)->name('user.main.success');
            Route::patch('/{user}', UpdateController::class)->name('user.main.update');
            Route::delete('/{preOrder}', DeleteController::class)->name('user.maim.delete');

        });
    });


//Restaurants-cafes Cafe
    Route::group(['namespace' => 'Cafe', 'prefix' => 'cafe', 'middleware' => ['auth', 'cafe', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('cafe.main.index');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('cafe.card.index');
            Route::get('/create', CreateController::class)->name('cafe.card.create');
            Route::post('/', StoreController::class)->name('cafe.card.store');
            Route::get('/{cafeCard}', ShowController::class)->name('cafe.card.show');
            Route::get('/{cafeCard}/edit', EditController::class)->name('cafe.card.edit');
            Route::patch('/{cafeCard}', UpdateController::class)->name('cafe.card.update');
            Route::delete('/{cafeCard}', DeleteController::class)->name('cafe.card.delete');
            Route::get('/{cafeCard}/image/', ImageController::class)->name('cafe.card.image');
            Route::post('/{cafeCard}/image/', ImageStoreController::class)->name('cafe.card.image_store');
            Route::delete('{cafeCard}/image/', ImageRemoveController::class, 'remove')->name('cafe.card.image_remove');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('cafe.tag.index');
            Route::get('/create', CreateController::class)->name('cafe.tag.create');
            Route::post('/', StoreController::class)->name('cafe.tag.store');
            Route::get('/{cafeTag}', ShowController::class)->name('cafe.tag.show');
            Route::get('/{cafeTag}/edit', EditController::class)->name('cafe.tag.edit');
            Route::patch('/{cafeTag}', UpdateController::class)->name('cafe.tag.update');
            Route::delete('/{cafeTag}', DeleteController::class)->name('cafe.tag.delete');
        });
        Route::group(['namespace' => 'Time', 'prefix' => 'times'], function () {
            Route::get('/', IndexController::class)->name('cafe.time.index');
            Route::get('/create', CreateController::class)->name('cafe.time.create');
            Route::post('/', StoreController::class)->name('cafe.time.store');
            Route::get('/{cafeTime}', ShowController::class)->name('cafe.time.show');
            Route::get('/{cafeTime}/edit', EditController::class)->name('cafe.time.edit');
            Route::patch('/{cafeTime}', UpdateController::class)->name('cafe.time.update');
            Route::delete('/{cafeTime}', DeleteController::class)->name('cafe.time.delete');
        });
        Route::group(['namespace' => 'TodoList', 'prefix' => 'todolist'], function () {
            Route::get('/', IndexController::class)->name('cafe.todolist.index');
            Route::get('/create', CreateController::class)->name('cafe.todolist.create');
            Route::post('/', StoreController::class)->name('cafe.todolist.store');
            Route::get('/{cafeTodoList}', ShowController::class)->name('cafe.todolist.show');
            Route::get('/{cafeTodoList}/edit', EditController::class)->name('cafe.todolist.edit');
            Route::patch('/{cafeTodoList}', UpdateController::class)->name('cafe.todolist.update');
            Route::delete('/{cafeTodoList}', DeleteController::class)->name('cafe.todolist.delete');
            Route::get('/{cafeTodoList}/item/', ItemController::class)->name('cafe.todolist.item');
            Route::post('/{cafeTodoList}/item/', ItemStoreController::class)->name('cafe.todolist.item_store');
            Route::delete('{cafeTodoList}/item/', ItemRemoveController::class, 'remove')->name('cafe.todolist.item_remove');
        });
        Route::group(['namespace' => 'TodoItem', 'prefix' => 'todoitem'], function () {
            ;
            Route::get('/{cafeTodoItem}/edit', EditController::class)->name('cafe.todoitem.edit');
            Route::patch('/{cafeTodoItem}', UpdateController::class)->name('cafe.todoitem.update');
            Route::get('/{cafeTodoItem}/product/', ProductController::class)->name('cafe.todoitem.product');
            Route::post('/{cafeTodoItem}/product/', ProductStoreController::class)->name('cafe.todoitem.product_store');
            Route::delete('{cafeTodoItem}/product/', ProductRemoveController::class, 'remove')->name('cafe.todoitem.product_remove');
        });
        Route::group(['namespace' => 'TodoProduct', 'prefix' => 'todoproduct'], function () {
            ;
            Route::get('/{cafeTodoProduct}/edit', EditController::class)->name('cafe.todoproduct.edit');
            Route::patch('/{cafeTodoProduct}', UpdateController::class)->name('cafe.todoproduct.update');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('cafe.action.index');
            Route::get('/create', CreateController::class)->name('cafe.action.create');
            Route::post('/', StoreController::class)->name('cafe.action.store');
            Route::get('/{cafeAction}', ShowController::class)->name('cafe.action.show');
            Route::get('/{cafeAction}/edit', EditController::class)->name('cafe.action.edit');
            Route::patch('/{cafeAction}', UpdateController::class)->name('cafe.action.update');
            Route::delete('/{cafeAction}', DeleteController::class)->name('cafe.action.delete');
        });
    });

//Medical
    Route::group(['namespace' => 'Medical', 'prefix' => 'medical', 'middleware' => ['auth', 'medical', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('medical.main.index');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('medical.card.index');
            Route::get('/create', CreateController::class)->name('medical.card.create');
            Route::post('/', StoreController::class)->name('medical.card.store');
            Route::get('/{medicalCard}', ShowController::class)->name('medical.card.show');
            Route::get('/{medicalCard}/edit', EditController::class)->name('medical.card.edit');
            Route::patch('/{medicalCard}', UpdateController::class)->name('medical.card.update');
            Route::delete('/{medicalCard}', DeleteController::class)->name('medical.card.delete');
            Route::get('/{medicalCard}/image/', ImageController::class)->name('medical.card.image');
            Route::post('/{medicalCard}/image/', ImageStoreController::class)->name('medical.card.image_store');
            Route::delete('{medicalCard}/image/', ImageRemoveController::class, 'remove')->name('medical.card.image_remove');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('medical.tag.index');
            Route::get('/create', CreateController::class)->name('medical.tag.create');
            Route::post('/', StoreController::class)->name('medical.tag.store');
            Route::get('/{medicalTag}', ShowController::class)->name('medical.tag.show');
            Route::get('/{medicalTag}/edit', EditController::class)->name('medical.tag.edit');
            Route::patch('/{medicalTag}', UpdateController::class)->name('medical.tag.update');
            Route::delete('/{medicalTag}', DeleteController::class)->name('medical.tag.delete');
        });
        Route::group(['namespace' => 'Time', 'prefix' => 'times'], function () {
            Route::get('/', IndexController::class)->name('medical.time.index');
            Route::get('/create', CreateController::class)->name('medical.time.create');
            Route::post('/', StoreController::class)->name('medical.time.store');
            Route::get('/{medicalTime}', ShowController::class)->name('medical.time.show');
            Route::get('/{medicalTime}/edit', EditController::class)->name('medical.time.edit');
            Route::patch('/{medicalTime}', UpdateController::class)->name('medical.time.update');
            Route::delete('/{medicalTime}', DeleteController::class)->name('medical.time.delete');
        });
        Route::group(['namespace' => 'TodoList', 'prefix' => 'todolist'], function () {
            Route::get('/', IndexController::class)->name('medical.todolist.index');
            Route::get('/create', CreateController::class)->name('medical.todolist.create');
            Route::post('/', StoreController::class)->name('medical.todolist.store');
            Route::get('/{medicalTodoList}', ShowController::class)->name('medical.todolist.show');
            Route::get('/{medicalTodoList}/edit', EditController::class)->name('medical.todolist.edit');
            Route::patch('/{medicalTodoList}', UpdateController::class)->name('medical.todolist.update');
            Route::delete('/{medicalTodoList}', DeleteController::class)->name('medical.todolist.delete');
            Route::get('/{medicalTodoList}/item/', ItemController::class)->name('medical.todolist.item');
            Route::post('/{medicalTodoList}/item/', ItemStoreController::class)->name('medical.todolist.item_store');
            Route::delete('{medicalTodoList}/item/', ItemRemoveController::class, 'remove')->name('medical.todolist.item_remove');
        });
        Route::group(['namespace' => 'TodoItem', 'prefix' => 'todoitem'], function () {
            ;
            Route::get('/{medicalTodoItem}/edit', EditController::class)->name('medical.todoitem.edit');
            Route::patch('/{medicalTodoItem}', UpdateController::class)->name('medical.todoitem.update');
            Route::get('/{medicalTodoItem}/product/', ProductController::class)->name('medical.todoitem.product');
            Route::post('/{medicalTodoItem}/product/', ProductStoreController::class)->name('medical.todoitem.product_store');
            Route::delete('{medicalTodoItem}/product/', ProductRemoveController::class, 'remove')->name('medical.todoitem.product_remove');
        });
        Route::group(['namespace' => 'TodoProduct', 'prefix' => 'todoproduct'], function () {
            ;
            Route::get('/{medicalTodoProduct}/edit', EditController::class)->name('medical.todoproduct.edit');
            Route::patch('/{medicalTodoProduct}', UpdateController::class)->name('medical.todoproduct.update');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('medical.action.index');
            Route::get('/create', CreateController::class)->name('medical.action.create');
            Route::post('/', StoreController::class)->name('medical.action.store');
            Route::get('/{medicalAction}', ShowController::class)->name('medical.action.show');
            Route::get('/{medicalAction}/edit', EditController::class)->name('medical.action.edit');
            Route::patch('/{medicalAction}', UpdateController::class)->name('medical.action.update');
            Route::delete('/{medicalAction}', DeleteController::class)->name('medical.action.delete');
        });
    });

//Spa
    Route::group(['namespace' => 'Spa', 'prefix' => 'spa', 'middleware' => ['auth', 'spa', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('spa.main.index');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('spa.card.index');
            Route::get('/create', CreateController::class)->name('spa.card.create');
            Route::post('/', StoreController::class)->name('spa.card.store');
            Route::get('/{spaCard}', ShowController::class)->name('spa.card.show');
            Route::get('/{spaCard}/edit', EditController::class)->name('spa.card.edit');
            Route::patch('/{spaCard}', UpdateController::class)->name('spa.card.update');
            Route::delete('/{spaCard}', DeleteController::class)->name('spa.card.delete');
            Route::get('/{spaCard}/image/', ImageController::class)->name('spa.card.image');
            Route::post('/{spaCard}/image/', ImageStoreController::class)->name('spa.card.image_store');
            Route::delete('{spaCard}/image/', ImageRemoveController::class, 'remove')->name('spa.card.image_remove');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('spa.tag.index');
            Route::get('/create', CreateController::class)->name('spa.tag.create');
            Route::post('/', StoreController::class)->name('spa.tag.store');
            Route::get('/{spaTag}', ShowController::class)->name('spa.tag.show');
            Route::get('/{spaTag}/edit', EditController::class)->name('spa.tag.edit');
            Route::patch('/{spaTag}', UpdateController::class)->name('spa.tag.update');
            Route::delete('/{spaTag}', DeleteController::class)->name('spa.tag.delete');
        });
        Route::group(['namespace' => 'Time', 'prefix' => 'times'], function () {
            Route::get('/', IndexController::class)->name('spa.time.index');
            Route::get('/create', CreateController::class)->name('spa.time.create');
            Route::post('/', StoreController::class)->name('spa.time.store');
            Route::get('/{spaTime}', ShowController::class)->name('spa.time.show');
            Route::get('/{spaTime}/edit', EditController::class)->name('spa.time.edit');
            Route::patch('/{spaTime}', UpdateController::class)->name('spa.time.update');
            Route::delete('/{spaTime}', DeleteController::class)->name('spa.time.delete');
        });
        Route::group(['namespace' => 'TodoList', 'prefix' => 'todolist'], function () {
            Route::get('/', IndexController::class)->name('spa.todolist.index');
            Route::get('/create', CreateController::class)->name('spa.todolist.create');
            Route::post('/', StoreController::class)->name('spa.todolist.store');
            Route::get('/{spaTodoList}', ShowController::class)->name('spa.todolist.show');
            Route::get('/{spaTodoList}/edit', EditController::class)->name('spa.todolist.edit');
            Route::patch('/{spaTodoList}', UpdateController::class)->name('spa.todolist.update');
            Route::delete('/{spaTodoList}', DeleteController::class)->name('spa.todolist.delete');
            Route::get('/{spaTodoList}/item/', ItemController::class)->name('spa.todolist.item');
            Route::post('/{spaTodoList}/item/', ItemStoreController::class)->name('spa.todolist.item_store');
            Route::delete('{spaTodoList}/item/', ItemRemoveController::class, 'remove')->name('spa.todolist.item_remove');
        });
        Route::group(['namespace' => 'TodoItem', 'prefix' => 'todoitem'], function () {
            ;
            Route::get('/{spaTodoItem}/edit', EditController::class)->name('spa.todoitem.edit');
            Route::patch('/{spaTodoItem}', UpdateController::class)->name('spa.todoitem.update');
            Route::get('/{spaTodoItem}/product/', ProductController::class)->name('spa.todoitem.product');
            Route::post('/{spaTodoItem}/product/', ProductStoreController::class)->name('spa.todoitem.product_store');
            Route::delete('{spaTodoItem}/product/', ProductRemoveController::class, 'remove')->name('spa.todoitem.product_remove');
        });
        Route::group(['namespace' => 'TodoProduct', 'prefix' => 'todoproduct'], function () {
            ;
            Route::get('/{spaTodoProduct}/edit', EditController::class)->name('spa.todoproduct.edit');
            Route::patch('/{spaTodoProduct}', UpdateController::class)->name('spa.todoproduct.update');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('spa.action.index');
            Route::get('/create', CreateController::class)->name('spa.action.create');
            Route::post('/', StoreController::class)->name('spa.action.store');
            Route::get('/{spaAction}', ShowController::class)->name('spa.action.show');
            Route::get('/{spaAction}/edit', EditController::class)->name('spa.action.edit');
            Route::patch('/{spaAction}', UpdateController::class)->name('spa.action.update');
            Route::delete('/{spaAction}', DeleteController::class)->name('spa.action.delete');
        });
    });
//sanatorium
    Route::group(['namespace' => 'Sanatorium', 'prefix' => 'sanatorium', 'middleware' => ['auth', 'sanatorium', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.main.index');
        });
        Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.post.index');
            Route::get('/create', CreateController::class)->name('sanatorium.post.create');
            Route::post('/', StoreController::class)->name('sanatorium.post.store');
            Route::get('/{sanatoriumPost}/edit', EditController::class)->name('sanatorium.post.edit');
            Route::patch('/{sanatoriumPost}', UpdateController::class)->name('sanatorium.post.update');
            Route::delete('/{sanatoriumPost}', DeleteController::class)->name('sanatorium.post.delete');
            Route::get('/{sanatoriumPost}/image/', ImageController::class)->name('sanatorium.post.image');
            Route::post('/{sanatoriumPost}/image/', ImageStoreController::class)->name('sanatorium.post.image_store');
            Route::delete('{sanatoriumPost}/image/', ImageRemoveController::class, 'remove')->name('sanatorium.post.image_remove');
        });
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.category.index');
            Route::get('/create', CreateController::class)->name('sanatorium.category.create');
            Route::post('/', StoreController::class)->name('sanatorium.category.store');
            Route::get('/{sanatoriumCategory}', ShowController::class)->name('sanatorium.category.show');
            Route::get('/{sanatoriumCategory}/edit', EditController::class)->name('sanatorium.category.edit');
            Route::patch('/{sanatoriumCategory}', UpdateController::class)->name('sanatorium.category.update');
            Route::delete('/{sanatoriumCategory}', DeleteController::class)->name('sanatorium.category.delete');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.tag.index');
            Route::get('/create', CreateController::class)->name('sanatorium.tag.create');
            Route::post('/', StoreController::class)->name('sanatorium.tag.store');
            Route::get('/{sanatoriumTag}', ShowController::class)->name('sanatorium.tag.show');
            Route::get('/{sanatoriumTag}/edit', EditController::class)->name('sanatorium.tag.edit');
            Route::patch('/{sanatoriumTag}', UpdateController::class)->name('sanatorium.tag.update');
            Route::delete('/{sanatoriumTag}', DeleteController::class)->name('sanatorium.tag.delete');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.card.index');
            Route::get('/create', CreateController::class)->name('sanatorium.card.create');
            Route::post('/', StoreController::class)->name('sanatorium.card.store');
            Route::get('/{sanatoriumCard}', ShowController::class)->name('sanatorium.card.show');
            Route::get('/{sanatoriumCard}/edit', EditController::class)->name('sanatorium.card.edit');
            Route::patch('/{sanatoriumCard}', UpdateController::class)->name('sanatorium.card.update');
            Route::delete('/{sanatoriumCard}', DeleteController::class)->name('sanatorium.card.delete');
            Route::get('/{sanatoriumCard}/image/', ImageController::class)->name('sanatorium.card.image');
            Route::post('/{sanatoriumCard}/image/', ImageStoreController::class)->name('sanatorium.card.image_store');
            Route::delete('{sanatoriumCard}/image/', ImageRemoveController::class)->name('sanatorium.card.image_remove');
        });
        Route::group(['namespace' => 'TagCard', 'prefix' => 'cardTags'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.tagCard.index');
            Route::get('/create', CreateController::class)->name('sanatorium.tagCard.create');
            Route::post('/', StoreController::class)->name('sanatorium.tagCard.store');
            Route::get('/{sanatoriumCardTag}', ShowController::class)->name('sanatorium.tagCard.show');
            Route::get('/{sanatoriumCardTag}/edit', EditController::class)->name('sanatorium.tagCard.edit');
            Route::patch('/{sanatoriumCardTag}', UpdateController::class)->name('sanatorium.tagCard.update');
            Route::delete('/{sanatoriumCardTag}', DeleteController::class)->name('sanatorium.tagCard.delete');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.action.index');
            Route::get('/create', CreateController::class)->name('sanatorium.action.create');
            Route::post('/', StoreController::class)->name('sanatorium.action.store');
            Route::get('/{sanatoriumAction}', ShowController::class)->name('sanatorium.action.show');
            Route::get('/{sanatoriumAction}/edit', EditController::class)->name('sanatorium.action.edit');
            Route::patch('/{sanatoriumAction}', UpdateController::class)->name('sanatorium.action.update');
            Route::delete('/{sanatoriumAction}', DeleteController::class)->name('sanatorium.action.delete');
        });
        Route::group(['namespace' => 'Servic', 'prefix' => 'servic'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.servic.index');
            Route::get('/create', CreateController::class)->name('sanatorium.servic.create');
            Route::post('/', StoreController::class)->name('sanatorium.servic.store');
            Route::get('/{sanatoriumServic}', ShowController::class)->name('sanatorium.servic.show');
            Route::get('/{sanatoriumServic}/edit', EditController::class)->name('sanatorium.servic.edit');
            Route::patch('/{sanatoriumServic}', UpdateController::class)->name('sanatorium.servic.update');
            Route::delete('/{sanatoriumServic}', DeleteController::class)->name('sanatorium.servic.delete');
        });
        Route::group(['namespace' => 'TodoList', 'prefix' => 'todolist'], function () {
            Route::get('/', IndexController::class)->name('sanatorium.todolist.index');
            Route::get('/create', CreateController::class)->name('sanatorium.todolist.create');
            Route::post('/', StoreController::class)->name('sanatorium.todolist.store');
            Route::get('/{sanatoriumTodoList}', ShowController::class)->name('sanatorium.todolist.show');
            Route::get('/{sanatoriumTodoList}/edit', EditController::class)->name('sanatorium.todolist.edit');
            Route::patch('/{sanatoriumTodoList}', UpdateController::class)->name('sanatorium.todolist.update');
            Route::delete('/{sanatoriumTodoList}', DeleteController::class)->name('sanatorium.todolist.delete');
            Route::get('/{sanatoriumTodoList}/item/', ItemController::class)->name('sanatorium.todolist.item');
            Route::post('/{sanatoriumTodoList}/item/', ItemStoreController::class)->name('sanatorium.todolist.item_store');
            Route::delete('{sanatoriumTodoList}/item/', ItemRemoveController::class, 'remove')->name('sanatorium.todolist.item_remove');
        });
        Route::group(['namespace' => 'TodoItem', 'prefix' => 'todoitem'], function () {
            ;
            Route::get('/{sanatoriumTodoItem}/edit', EditController::class)->name('sanatorium.todoitem.edit');
            Route::patch('/{sanatoriumTodoItem}', UpdateController::class)->name('sanatorium.todoitem.update');
            Route::get('/{sanatoriumTodoItem}/product/', ProductController::class)->name('sanatorium.todoitem.product');
            Route::post('/{sanatoriumTodoItem}/product/', ProductStoreController::class)->name('sanatorium.todoitem.product_store');
            Route::delete('{sanatoriumTodoItem}/product/', ProductRemoveController::class, 'remove')->name('sanatorium.todoitem.product_remove');
        });
        Route::group(['namespace' => 'TodoProduct', 'prefix' => 'todoproduct'], function () {
            ;
            Route::get('/{sanatoriumTodoProduct}/edit', EditController::class)->name('sanatorium.todoproduct.edit');
            Route::patch('/{sanatoriumTodoProduct}', UpdateController::class)->name('sanatorium.todoproduct.update');
        });
    });

//turoperator
    Route::group(['namespace' => 'Turoperator', 'prefix' => 'turoperator', 'middleware' => ['auth', 'turoperator', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('turoperator.main.index');
        });
        Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            Route::get('/', IndexController::class)->name('turoperator.post.index');
            Route::get('/create', CreateController::class)->name('turoperator.post.create');
            Route::post('/', StoreController::class)->name('turoperator.post.store');
            Route::get('/{turoperatorPost}/edit', EditController::class)->name('turoperator.post.edit');
            Route::patch('/{turoperatorPost}', UpdateController::class)->name('turoperator.post.update');
            Route::delete('/{turoperatorPost}', DeleteController::class)->name('turoperator.post.delete');
            Route::get('/{turoperatorPost}/image/', ImageController::class)->name('turoperator.post.image');
            Route::post('/{turoperatorPost}/image/', ImageStoreController::class)->name('turoperator.post.image_store');
            Route::delete('{turoperatorPost}/image/', ImageRemoveController::class, 'remove')->name('turoperator.post.image_remove');
        });
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', IndexController::class)->name('turoperator.category.index');
            Route::get('/create', CreateController::class)->name('turoperator.category.create');
            Route::post('/', StoreController::class)->name('turoperator.category.store');
            Route::get('/{turoperatorCategory}', ShowController::class)->name('turoperator.category.show');
            Route::get('/{turoperatorCategory}/edit', EditController::class)->name('turoperator.category.edit');
            Route::patch('/{turoperatorCategory}', UpdateController::class)->name('turoperator.category.update');
            Route::delete('/{turoperatorCategory}', DeleteController::class)->name('turoperator.category.delete');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('turoperator.tag.index');
            Route::get('/create', CreateController::class)->name('turoperator.tag.create');
            Route::post('/', StoreController::class)->name('turoperator.tag.store');
            Route::get('/{turoperatorTag}', ShowController::class)->name('turoperator.tag.show');
            Route::get('/{turoperatorTag}/edit', EditController::class)->name('turoperator.tag.edit');
            Route::patch('/{turoperatorTag}', UpdateController::class)->name('turoperator.tag.update');
            Route::delete('/{turoperatorTag}', DeleteController::class)->name('turoperator.tag.delete');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('turoperator.card.index');
            Route::get('/create', CreateController::class)->name('turoperator.card.create');
            Route::post('/', StoreController::class)->name('turoperator.card.store');
            Route::get('/{turoperatorCard}', ShowController::class)->name('turoperator.card.show');
            Route::get('/{turoperatorCard}/edit', EditController::class)->name('turoperator.card.edit');
            Route::patch('/{turoperatorCard}', UpdateController::class)->name('turoperator.card.update');
            Route::delete('/{turoperatorCard}', DeleteController::class)->name('turoperator.card.delete');
            Route::get('/{turoperatorCard}/image/', ImageController::class)->name('turoperator.card.image');
            Route::post('/{turoperatorCard}/image/', ImageStoreController::class)->name('turoperator.card.image_store');
            Route::delete('{turoperatorCard}/image/', ImageRemoveController::class)->name('turoperator.card.image_remove');
        });
        Route::group(['namespace' => 'TagCard', 'prefix' => 'cardTags'], function () {
            Route::get('/', IndexController::class)->name('turoperator.tagCard.index');
            Route::get('/create', CreateController::class)->name('turoperator.tagCard.create');
            Route::post('/', StoreController::class)->name('turoperator.tagCard.store');
            Route::get('/{turoperatorCardTag}', ShowController::class)->name('turoperator.tagCard.show');
            Route::get('/{turoperatorCardTag}/edit', EditController::class)->name('turoperator.tagCard.edit');
            Route::patch('/{turoperatorCardTag}', UpdateController::class)->name('turoperator.tagCard.update');
            Route::delete('/{turoperatorCardTag}', DeleteController::class)->name('turoperator.tagCard.delete');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('turoperator.action.index');
            Route::get('/create', CreateController::class)->name('turoperator.action.create');
            Route::post('/', StoreController::class)->name('turoperator.action.store');
            Route::get('/{turoperatorAction}', ShowController::class)->name('turoperator.action.show');
            Route::get('/{turoperatorAction}/edit', EditController::class)->name('turoperator.action.edit');
            Route::patch('/{turoperatorAction}', UpdateController::class)->name('turoperator.action.update');
            Route::delete('/{turoperatorAction}', DeleteController::class)->name('turoperator.action.delete');
        });
        Route::group(['namespace' => 'Servic', 'prefix' => 'servic'], function () {
            Route::get('/', IndexController::class)->name('turoperator.servic.index');
            Route::get('/create', CreateController::class)->name('turoperator.servic.create');
            Route::post('/', StoreController::class)->name('turoperator.servic.store');
            Route::get('/{turoperatorServic}', ShowController::class)->name('turoperator.servic.show');
            Route::get('/{turoperatorServic}/edit', EditController::class)->name('turoperator.servic.edit');
            Route::patch('/{turoperatorServic}', UpdateController::class)->name('turoperator.servic.update');
            Route::delete('/{turoperatorServic}', DeleteController::class)->name('turoperator.servic.delete');
        });
        Route::group(['namespace' => 'Time', 'prefix' => 'times'], function () {
            Route::get('/', IndexController::class)->name('turoperator.time.index');
            Route::get('/create', CreateController::class)->name('turoperator.time.create');
            Route::post('/', StoreController::class)->name('turoperator.time.store');
            Route::get('/{turoperatorTime}', ShowController::class)->name('turoperator.time.show');
            Route::get('/{turoperatorTime}/edit', EditController::class)->name('turoperator.time.edit');
            Route::patch('/{turoperatorTime}', UpdateController::class)->name('turoperator.time.update');
            Route::delete('/{turoperatorTime}', DeleteController::class)->name('turoperator.time.delete');
        });
    });

//sport
    Route::group(['namespace' => 'Sport', 'prefix' => 'sport', 'middleware' => ['auth', 'sport', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', IndexController::class)->name('sport.main.index');
        });
        Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            Route::get('/', IndexController::class)->name('sport.post.index');
            Route::get('/create', CreateController::class)->name('sport.post.create');
            Route::post('/', StoreController::class)->name('sport.post.store');
            Route::get('/{sportPost}/edit', EditController::class)->name('sport.post.edit');
            Route::patch('/{sportPost}', UpdateController::class)->name('sport.post.update');
            Route::delete('/{sportPost}', DeleteController::class)->name('sport.post.delete');
            Route::get('/{sportPost}/image/', ImageController::class)->name('sport.post.image');
            Route::post('/{sportPost}/image/', ImageStoreController::class)->name('sport.post.image_store');
            Route::delete('{sportPost}/image/', ImageRemoveController::class, 'remove')->name('sport.post.image_remove');
        });
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', IndexController::class)->name('sport.category.index');
            Route::get('/create', CreateController::class)->name('sport.category.create');
            Route::post('/', StoreController::class)->name('sport.category.store');
            Route::get('/{sportCategory}', ShowController::class)->name('sport.category.show');
            Route::get('/{sportCategory}/edit', EditController::class)->name('sport.category.edit');
            Route::patch('/{sportCategory}', UpdateController::class)->name('sport.category.update');
            Route::delete('/{sportCategory}', DeleteController::class)->name('sport.category.delete');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', IndexController::class)->name('sport.tag.index');
            Route::get('/create', CreateController::class)->name('sport.tag.create');
            Route::post('/', StoreController::class)->name('sport.tag.store');
            Route::get('/{sportTag}', ShowController::class)->name('sport.tag.show');
            Route::get('/{sportTag}/edit', EditController::class)->name('sport.tag.edit');
            Route::patch('/{sportTag}', UpdateController::class)->name('sport.tag.update');
            Route::delete('/{sportTag}', DeleteController::class)->name('sport.tag.delete');
        });
        Route::group(['namespace' => 'Card', 'prefix' => 'cards'], function () {
            Route::get('/', IndexController::class)->name('sport.card.index');
            Route::get('/create', CreateController::class)->name('sport.card.create');
            Route::post('/', StoreController::class)->name('sport.card.store');
            Route::get('/{sportCard}', ShowController::class)->name('sport.card.show');
            Route::get('/{sportCard}/edit', EditController::class)->name('sport.card.edit');
            Route::patch('/{sportCard}', UpdateController::class)->name('sport.card.update');
            Route::delete('/{sportCard}', DeleteController::class)->name('sport.card.delete');
            Route::get('/{sportCard}/image/', ImageController::class)->name('sport.card.image');
            Route::post('/{sportCard}/image/', ImageStoreController::class)->name('sport.card.image_store');
            Route::delete('{sportCard}/image/', ImageRemoveController::class)->name('sport.card.image_remove');
        });
        Route::group(['namespace' => 'TagCard', 'prefix' => 'cardTags'], function () {
            Route::get('/', IndexController::class)->name('sport.tagCard.index');
            Route::get('/create', CreateController::class)->name('sport.tagCard.create');
            Route::post('/', StoreController::class)->name('sport.tagCard.store');
            Route::get('/{sportCardTag}', ShowController::class)->name('sport.tagCard.show');
            Route::get('/{sportCardTag}/edit', EditController::class)->name('sport.tagCard.edit');
            Route::patch('/{sportCardTag}', UpdateController::class)->name('sport.tagCard.update');
            Route::delete('/{sportCardTag}', DeleteController::class)->name('sport.tagCard.delete');
        });
        Route::group(['namespace' => 'Action', 'prefix' => 'action'], function () {
            Route::get('/', IndexController::class)->name('sport.action.index');
            Route::get('/create', CreateController::class)->name('sport.action.create');
            Route::post('/', StoreController::class)->name('sport.action.store');
            Route::get('/{sportAction}', ShowController::class)->name('sport.action.show');
            Route::get('/{sportAction}/edit', EditController::class)->name('sport.action.edit');
            Route::patch('/{sportAction}', UpdateController::class)->name('sport.action.update');
            Route::delete('/{sportAction}', DeleteController::class)->name('sport.action.delete');
        });
        Route::group(['namespace' => 'Servic', 'prefix' => 'servic'], function () {
            Route::get('/', IndexController::class)->name('sport.servic.index');
            Route::get('/create', CreateController::class)->name('sport.servic.create');
            Route::post('/', StoreController::class)->name('sport.servic.store');
            Route::get('/{sportServic}', ShowController::class)->name('sport.servic.show');
            Route::get('/{sportServic}/edit', EditController::class)->name('sport.servic.edit');
            Route::patch('/{sportServic}', UpdateController::class)->name('sport.servic.update');
            Route::delete('/{sportServic}', DeleteController::class)->name('sport.servic.delete');
        });
        Route::group(['namespace' => 'TodoList', 'prefix' => 'todolist'], function () {
            Route::get('/', IndexController::class)->name('sport.todolist.index');
            Route::get('/create', CreateController::class)->name('sport.todolist.create');
            Route::post('/', StoreController::class)->name('sport.todolist.store');
            Route::get('/{sportTodoList}', ShowController::class)->name('sport.todolist.show');
            Route::get('/{sportTodoList}/edit', EditController::class)->name('sport.todolist.edit');
            Route::patch('/{sportTodoList}', UpdateController::class)->name('sport.todolist.update');
            Route::delete('/{sportTodoList}', DeleteController::class)->name('sport.todolist.delete');
            Route::get('/{sportTodoList}/item/', ItemController::class)->name('sport.todolist.item');
            Route::post('/{sportTodoList}/item/', ItemStoreController::class)->name('sport.todolist.item_store');
            Route::delete('{sportTodoList}/item/', ItemRemoveController::class, 'remove')->name('sport.todolist.item_remove');
        });
        Route::group(['namespace' => 'TodoItem', 'prefix' => 'todoitem'], function () {
            ;
            Route::get('/{sportTodoItem}/edit', EditController::class)->name('sport.todoitem.edit');
            Route::patch('/{sportTodoItem}', UpdateController::class)->name('sport.todoitem.update');
            Route::get('/{sportTodoItem}/product/', ProductController::class)->name('sport.todoitem.product');
            Route::post('/{sportTodoItem}/product/', ProductStoreController::class)->name('sport.todoitem.product_store');
            Route::delete('{sportTodoItem}/product/', ProductRemoveController::class, 'remove')->name('sport.todoitem.product_remove');
        });
        Route::group(['namespace' => 'TodoProduct', 'prefix' => 'todoproduct'], function () {
            ;
            Route::get('/{sportTodoProduct}/edit', EditController::class)->name('sport.todoproduct.edit');
            Route::patch('/{sportTodoProduct}', UpdateController::class)->name('sport.todoproduct.update');
        });
    });

});
Route::group(['namespace' => 'Payment'], function () {
    Route::get('/payment/rest/', IndexController::class)->name('payment.index');
    Route::post('/payment/success/', StatusController::class)->name('payment.status');
});
Auth::routes();

Route::get('{page}', \App\Http\Controllers\Client\IndexController::class)->where('page', '.*');
