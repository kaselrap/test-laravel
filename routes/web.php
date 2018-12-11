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

//Route::get('/', 'MainController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ArticleController@getAll')->name('welcome');
Route::get('/article/{id}', 'ArticleController@getArticleById')->name('article.full');
Route::get('/add', 'ArticleController@index')->middleware('auth')->name('article.index');
Route::get('/edit/{id}', 'ArticleController@edit')->middleware('auth')->name('article.edit');
Route::match(['POST', 'GET'],'/{type}/{id?}', 'ArticleController@store')->middleware('auth')->name('article.store');
Route::delete('/delete/{id}', 'ArticleController@delete')->middleware('auth')->name('article.delete');


Route::resource('articles', 'HomeController');