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
Route::get('popular', 'ArticleController@popular')->name('popular');
/**
 * Users
 */
Route::group(['prefix' => 'users', 'middleware' => 'web'], function () {
    Route::get('/', [
        'as' => 'users',
        'uses' => 'ProfileController@getAll'
    ]);
    Route::get('profile/{user}', [
        'as' => 'user.profile',
        'uses' => 'ProfileController@index'
    ]);
    Route::get('articles/{user}', [
        'as' => 'user.articles',
        'uses' => 'ArticleController@getByUserId'
    ]);
    Route::post('{type}/{user}', [
        'as' => 'user.subscription',
        'uses' => 'ProfileController@subscription'
    ])->where('type', 'subscribe|unsubscribe');
    Route::get('subscriptions', [
        'as' => 'user.subscriptions',
        'middleware' => 'auth',
        'uses' => 'ProfileController@subscriptions'
    ]);
});


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
    Route::get('all', [
       'as' => 'article.all',
       'uses' => 'ArticleController@all'
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
