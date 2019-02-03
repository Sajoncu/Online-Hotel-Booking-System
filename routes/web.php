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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///admin route group
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>['auth', 'admin']], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::resource('tag', 'TagController');
	Route::resource('category','CategoryController');
	Route::resource('post','PostController');
	Route::get('/pending/post', 'PostController@pending')->name('post.pending');
	Route::put('post/{id}/aprove','PostController@approval')->name('post.approve');
	Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
	Route::delete('subscriber/{subscriber}', 'SubscriberController@destroy')->name('subscriber.destroy');
});

//author route group
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Author', 'middleware'=>['auth', 'customer']], function(){
	
	Route::get('dashboard', 'AuthorController@index')->name('dashboard');
	Route::resource('post','PostController');
});