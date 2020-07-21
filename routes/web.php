<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Actors','prefix' => 'actors','middleware' => 'auth'],function(){
    Route::get('/','ActorsController@index')->name('actors.index');
    Route::get('/create','ActorsController@create')->name('actors.create');
    Route::post('/create','ActorsController@store')->name('actors.store');
    Route::get('/{id}','ActorsController@show')->name('actors.show');
    Route::get('/update/{id}','ActorsController@update')->name('actors.update');
    Route::put('/update/{id}','ActorsController@put')->name('actors.put');
    Route::get('/destroy/{id}','ActorsController@delete')->name('actors.delete');
    Route::post('/{id}','ActorsController@destroy')->name('actors.destroy');
});

Route::group(['namespace' => 'Movies','prefix' => 'movies','middleware' => 'auth'],function(){
    Route::get('/','MoviesController@index')->name('movies.index');
    Route::get('/create','MoviesController@create')->name('movies.create');
    Route::post('/create','MoviesController@store')->name('movies.store');
    Route::get('/{id}','MoviesController@show')->name('movies.show');
    Route::get('/update/{id}','MoviesController@update')->name('movies.update');
    Route::put('/update/{id}','MoviesController@put')->name('movies.put');
    Route::get('/destroy/{id}','MoviesController@delete')->name('movies.delete');
    Route::post('/{id}','MoviesController@destroy')->name('movies.destroy');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

