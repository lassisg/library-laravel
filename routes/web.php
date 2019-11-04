<?php

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

Route::get('/', 'PagesController@index');
// Route::get('/books', 'PagesController@books');
// Route::get('/authors', 'PagesController@authors');

Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');

Route::resource('books', 'BooksController');
Route::resource('authors', 'AuthorsController');
Route::resource('publishers', 'PublishersController');
Route::resource('contacts', 'ContactsController');

// MYTODO: Use the below to get editor (useful for Verdi admin)
// https://github.com/UniSharp/laravel-ckeditor
// composer require unisharp/laravel-ckeditor
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');