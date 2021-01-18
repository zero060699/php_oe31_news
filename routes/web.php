<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::group(['middleware' => ['localization']], function () {
    Route::resource('dashboard', 'AdminController')->only('index');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::get('/postRequest', 'AdminController@showRequestPost')->name('postRequest');
    Route::resource('home', 'ClientController');
    Route::resource('users', 'UserController');
    Route::resource('authors', 'AuthorController');
    Route::get('/filter/{id}', 'ClientController@filterCategory')->name('filterCategory');
    Route::get('/search', 'PostController@search')->name('search');
    Route::post('/like', 'ClientController@postLike')->name('like');
    Route::post('/dislike', 'ClientController@postDisLike')->name('dislike');
    Route::resource('comments', 'CommentController');
    Route::post('/requestAuthor', 'AuthorController@requestAuthor')->name('requestAuthor');
    Route::resource('requests', 'RequestAuthorController');
});
Route::get('change-languages/{language}', 'LangController@changeLanguage')->name('change-languages');
Auth::routes();


