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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('countries', 'ProfileController@countries')->name('countries');

Route::get('/user/profile/{user}', [
    'as' => 'user.profile',
    'uses' => 'ProfileController@index'
]);

Route::group(['prefix' => 'profile', 'middleware' => 'web'], function () {
    Route::get('/', [
        'as' => 'profile',
        'middleware' => 'auth',
        'uses' => 'ProfileController@index'
    ]);
    Route::get('edit',[
        'as' => 'profile.edit',
        'middleware' => 'auth',
        'uses' => 'ProfileController@show'
    ]);
    Route::post('store', [
        'as' => 'profile.store',
        'middleware' => 'auth',
        'uses' => 'ProfileController@store'
    ]);
});

Route::group(['prefix' => 'articles', 'middleware'=>'web'], function (){
    Route::get('/', [
        'as' => 'articles',
        'middleware' => 'auth',
        'uses' => 'ArticleController@index'
    ]);
    Route::get('search/{query?}', [
        'as' => 'articles.search',
        'uses' => 'ArticleController@search'
    ]);

    Route::post('{article}/comment/{comment_id?}', [
        'as' => 'article.commentsCreate',
        'middleware' => 'auth',
        'uses' => 'CommentController@create'
    ]);
    Route::get('/article/{article}', [
        'as' => 'article.full',
        'uses' => 'ArticleController@getArticleById'
    ]);
    Route::get('add', [
        'as' => 'article.add',
        'middleware' => 'auth',
        'uses' => 'ArticleController@show'
    ]);
    Route::get('edit/{article}', [
        'as' => 'article.edit',
        'middleware' => 'auth',
        'uses' => 'ArticleController@show'
    ])->where('id', '[0-9]+');
    Route::post('{type}/{article?}', [
        'as' => 'article.store',
        'middleware' => 'auth',
        'uses' => 'ArticleController@store'
    ])->where('type', '(edit|add)');
    Route::post('{article}/{action}', [
        'as' => 'article.action',
        'uses' => 'ArticleController@action'
    ])->where('action', '(like|dislike)');
    Route::delete('delete/{article}', [
        'as' => 'article.delete',
        'middleware' => 'auth',
        'uses' => 'ArticleController@delete'
    ]);
});

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/', 'ArticleController@getAll')->name('welcome');
//Route::get('/article/{id}', 'ArticleController@getArticleById')->name('article.full');
//Route::get('/add', 'ArticleController@index')->middleware('auth')->name('article.index');
//Route::get('/edit/{id}', 'ArticleController@edit')->middleware('auth')->name('article.edit');
//Route::match(['POST', 'GET'],'/{type}/{id?}', 'ArticleController@store')->middleware('auth')->name('article.store');
//Route::delete('/delete/{id}', 'ArticleController@delete')->middleware('auth')->name('article.delete');


//Route::resource('articles', 'HomeController');