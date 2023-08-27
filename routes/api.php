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

Route::get('/posts', \App\Http\Controllers\API\Blog\IndexController::class); // посты в блог
Route::get('/posts/{post}', \App\Http\Controllers\API\Blog\ShowController::class); // 1 пост в блог
Route::get('/baners', \App\Http\Controllers\API\Baner\IndexController::class); // картинки на главной для слайдера


Route::get('/users/filters', \App\Http\Controllers\API\User\FilterListController::class); // фильтр на главной наверное
Route::get('/users', \App\Http\Controllers\API\User\IndexController::class); // все пользователи

Route::post('/medicals', \App\Http\Controllers\API\Medical\IndexController::class);  // карты медиков
Route::get('/medicals/filters', \App\Http\Controllers\API\Medical\FilterListController::class); // фильтр карт медиков
Route::get('/medicals/{medicalCard}', \App\Http\Controllers\API\Medical\ShowController::class); // карта медиков
Route::get('/time', \App\Http\Controllers\API\Medical\TimeController::class); // время в карте медиков
Route::get('/list', \App\Http\Controllers\API\Medical\ListController::class); // категории в карте медиков (зеленые)
Route::get('/item', \App\Http\Controllers\API\Medical\ItemController::class); // список подкатегорий (но они выводятся как продукты там цена стоит у них в карте)
Route::get('/product', \App\Http\Controllers\API\Medical\ProductController::class); // это должны быть продукты, но они тип чет не используются
Route::post('medicals/{medicalCard}/comments', \App\Http\Controllers\API\Medical\CommentController::class); // Записывает коммент для карты
Route::post('/show/{medicalCard}/comments', \App\Http\Controllers\API\Medical\ShowCommentController::class); // показывает коммент для карты
Route::delete('/medicals/comment/{id}', \App\Http\Controllers\API\Medical\DeleteCommentController::class); // удаляет коммент в карте
Route::get('/medicalAction', \App\Http\Controllers\API\Medical\ActionController::class); // Преференции для клиентов платформы
Route::get('/medicalImage', \App\Http\Controllers\API\Medical\ImagesController::class); //  выводит фотки в карту тип


Route::post('/spa', \App\Http\Controllers\API\Spa\IndexController::class); // все спа
Route::get('/spa/filters', \App\Http\Controllers\API\Spa\FilterListController::class); // фильтр
Route::get('/spa/{spaCard}', \App\Http\Controllers\API\Spa\ShowController::class); // карта
Route::get('/spatimes', \App\Http\Controllers\API\Spa\TimeController::class); // время в карте
Route::get('/spalists', \App\Http\Controllers\API\Spa\ListController::class); // категории продуктов
Route::get('/spaitems', \App\Http\Controllers\API\Spa\ItemController::class); // подкатегории (стоят с ценой сча)
Route::get('/spaproducts', \App\Http\Controllers\API\Spa\ProductController::class); // должны тип быть продукты, они не выводятся
Route::post('/spa/{spaCard}/comments', \App\Http\Controllers\API\Spa\CommentController::class); // записать коммент
Route::post('/spa/show/{spaCard}/comments', \App\Http\Controllers\API\Spa\ShowCommentController::class); // вывод коммента
Route::delete('/spa/comment/{id}', \App\Http\Controllers\API\Spa\DeleteCommentController::class); // удаление коммента
Route::get('/spaAction', \App\Http\Controllers\API\Spa\ActionController::class); // преференции
Route::get('/spaImage', \App\Http\Controllers\API\Spa\ImagesController::class); // картинки

Route::post('/cafes', \App\Http\Controllers\API\Cafe\IndexController::class); // все кафе
Route::get('/cafes/filters', \App\Http\Controllers\API\Cafe\FilterListController::class); // фильтр для кафе
Route::get('/cafe/{cafeCard}', \App\Http\Controllers\API\Cafe\ShowController::class); // карта 1 кафе
Route::get('/cafetimes', \App\Http\Controllers\API\Cafe\TimeController::class); // время
Route::get('/cafelists', \App\Http\Controllers\API\Cafe\ListController::class); // категории продуктов
Route::get('/cafeitems', \App\Http\Controllers\API\Cafe\ItemController::class); // подкатегория
Route::get('/cafeproducts', \App\Http\Controllers\API\Cafe\ProductController::class); // продукт который  не выводится либо они оказались не нужны и выше тоже самое
Route::post('/cafe/{cafeCard}/comments', \App\Http\Controllers\API\Cafe\CommentController::class); // записать коммент
Route::post('/cafe/show/{cafeCard}/comments', \App\Http\Controllers\API\Cafe\ShowCommentController::class); // показать все комменты
Route::delete('/cafe/comment/{id}', \App\Http\Controllers\API\Cafe\DeleteCommentController::class); //удалить коммент
Route::get('/cafeAction', \App\Http\Controllers\API\Cafe\ActionController::class);//преференции
Route::get('/cafeImage', \App\Http\Controllers\API\Cafe\ImagesController::class); //картинки

Route::post('/hostels', \App\Http\Controllers\API\Hostel\IndexController::class); //все отели
Route::get('/hostels/filters', \App\Http\Controllers\API\Hostel\FilterListController::class); //фильтр для отелей
Route::get('/hostel/{hostelCard}', \App\Http\Controllers\API\Hostel\ShowController::class); // 1 отель
Route::get('/hostelAction', \App\Http\Controllers\API\Hostel\ActionController::class); //преферениции
Route::get('/hostelServic', \App\Http\Controllers\API\Hostel\ServicController::class); // услуги и удобства
Route::get('/hostelCategories', \App\Http\Controllers\API\Hostel\CategoryController::class); // категории отелей
Route::get('/hostelPost', \App\Http\Controllers\API\Hostel\PostController::class); // посты (номера отелей)
Route::post('/hostel/{hostelCard}/comments', \App\Http\Controllers\API\Hostel\CommentController::class); //записать коммент
Route::post('/hostelShow/{hostelCard}/comments', \App\Http\Controllers\API\Hostel\ShowCommentController::class); // все комменты
Route::delete('/hostel/comment/{id}', \App\Http\Controllers\API\Hostel\DeleteCommentController::class); // Удалить коммент


Route::post('/sanatoriums', \App\Http\Controllers\API\Sanatorium\IndexController::class); // все санатории
Route::get('/sanatoriums/filters', \App\Http\Controllers\API\Sanatorium\FilterListController::class); // фильтры санаториев
Route::get('/sanatorium/{sanatoriumCard}', \App\Http\Controllers\API\Sanatorium\ShowController::class); // карта санатория
Route::get('/sanatoriumAction', \App\Http\Controllers\API\Sanatorium\ActionController::class); // преференции
Route::get('/sanatoriumServic', \App\Http\Controllers\API\Sanatorium\ServicController::class); //услуги удобства
Route::get('/sanatoriumCategories', \App\Http\Controllers\API\Sanatorium\CategoryController::class); //категории
Route::get('/sanatoriumPost', \App\Http\Controllers\API\Sanatorium\PostController::class); //номера
Route::post('/sanatorium/{sanatoriumCard}/comments', \App\Http\Controllers\API\Sanatorium\CommentController::class); //запись коммента
Route::post('/sanatoriumShow/{sanatoriumCard}/comments', \App\Http\Controllers\API\Sanatorium\ShowCommentController::class); // вывод комментов
Route::delete('/sanatorium/comment/{id}', \App\Http\Controllers\API\Sanatorium\DeleteCommentController::class); //удаление коммента
Route::get('/sanatoriumLists', \App\Http\Controllers\API\Sanatorium\ListController::class); // список категорий услуг (зеленые)
Route::get('/sanatoriumItems', \App\Http\Controllers\API\Sanatorium\ItemController::class); // сами услуги  (подкатегория стоят сча с ценой)
Route::get('/sanatoriumProducts', \App\Http\Controllers\API\Sanatorium\ProductController::class); //тип продукты которые нахуй чет никому не сдались сча, а сразу нужны были

Route::post('/turs', \App\Http\Controllers\API\Tur\IndexController::class); // все туристы
Route::get('/turs/filters', \App\Http\Controllers\API\Tur\FilterListController::class);// фильтр туристов
Route::get('/tur/{turCard}', \App\Http\Controllers\API\Tur\ShowController::class);//карта туриста
Route::get('/turAction', \App\Http\Controllers\API\Tur\ActionController::class);//преференции туристов
Route::get('/turServic', \App\Http\Controllers\API\Tur\ServicController::class);//услуги и удобства туристов
Route::get('/turCategories', \App\Http\Controllers\API\Tur\CategoryController::class);//категории туристов
Route::get('/turPost', \App\Http\Controllers\API\Tur\PostController::class); //номера туристов
Route::post('/tur/{turCard}/comments', \App\Http\Controllers\API\Tur\CommentController::class); //записать коммент
Route::post('/turShow/{turCard}/comments', \App\Http\Controllers\API\Tur\ShowCommentController::class);//показать коммент
Route::delete('/tur/comment/{id}', \App\Http\Controllers\API\Tur\DeleteCommentController::class);//удалить коммент
Route::get('/turtime', \App\Http\Controllers\API\Tur\TimeController::class);//время в карте туристов

Route::post('/sports', \App\Http\Controllers\API\Sport\IndexController::class); //все спортики
Route::get('/sports/filters', \App\Http\Controllers\API\Sport\FilterListController::class);//фильтры спорт
Route::get('/sport/{sportCard}', \App\Http\Controllers\API\Sport\ShowController::class);//карта 1
Route::get('/sportAction', \App\Http\Controllers\API\Sport\ActionController::class);//префернции
Route::get('/sportServic', \App\Http\Controllers\API\Sport\ServicController::class);// услуги
Route::get('/sportCategories', \App\Http\Controllers\API\Sport\CategoryController::class);//категории
Route::get('/sportPost', \App\Http\Controllers\API\Sport\PostController::class);//номера
Route::post('/sport/{sportCard}/comments', \App\Http\Controllers\API\Sport\CommentController::class);//записать коммент
Route::post('/sportShow/{sportCard}/comments', \App\Http\Controllers\API\Sport\ShowCommentController::class);//показать коммент
Route::delete('/sport/comment/{id}', \App\Http\Controllers\API\Sport\DeleteCommentController::class);//удалить коммент
Route::get('/sportLists', \App\Http\Controllers\API\Sport\ListController::class);//инфаструктура категории (зеленые)
Route::get('/sportItems', \App\Http\Controllers\API\Sport\ItemController::class);//подкатегории с ценой сча стоят ()
Route::get('/sportProducts', \App\Http\Controllers\API\Sport\ProductController::class);//тип сами продукты но там чет их никто не добавляет


//consulting
Route::get('/consultingCat', \App\Http\Controllers\API\Consulting\CategoryController::class);
Route::get('/consultingCards', \App\Http\Controllers\API\Consulting\CardController::class);
Route::get('/consultingTodoList', \App\Http\Controllers\API\Consulting\TodoListController::class);
Route::get('/consultingCard/{consultingCard}', \App\Http\Controllers\API\Consulting\ShowController::class);
Route::get('/consultingServ', \App\Http\Controllers\API\Consulting\ServicController::class);
Route::get('/consultingList', \App\Http\Controllers\API\Consulting\ListsController::class);
Route::post('/consulting/{consultingPost}/comments', \App\Http\Controllers\API\Consulting\CommentController::class);//записать коммент
Route::post('/consultingShow/{consultingPost}/comments', \App\Http\Controllers\API\Consulting\ShowCommentController::class);//показать коммент
Route::delete('/consulting/comment/{id}', \App\Http\Controllers\API\Consulting\DeleteCommentController::class);//удалить коммент
Route::post('consulting/orders', \App\Http\Controllers\API\Consulting\OrdersController::class);//удалить коммент



Route::post('/preOrder', \App\Http\Controllers\API\PreOrder\StoreController::class); // записать заказ в корзину

