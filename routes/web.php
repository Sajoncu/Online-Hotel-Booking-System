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

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('contact-us', 'HomeController@contactUs')->name('contactus');
Route::get('about-us', 'HomeController@abouttUs')->name('aboutus');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

///admin route group
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>['auth', 'admin']], function(){

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('booking/room', 'DashboardController@allNewBooking')->name('allbooking');
	// Route::resource('tag', 'TagController');
	// Route::resource('category','CategoryController');
	Route::resource('room','RoomController');
	Route::resource('booking','BookingController');
	Route::get('/available/room', 'RoomController@roomAvailable')->name('available.room');
	Route::put('booking/{id}/aprove','BookingController@approval')->name('booking.approve');

	Route::post('booking/checkout','BookingController@bookingCheckout')->name('booking.checkout');
	// Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
	// Route::delete('subscriber/{subscriber}', 'SubscriberController@destroy')->name('subscriber.destroy');

	Route::get('profile','DashboardController@profile')->name('profile');
	Route::put('update-profile','DashboardController@updateProfileData')->name('profile.update');
	Route::put('update-password','DashboardController@updatePassword')->name('password.update');
});

//author route group
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Author'], function(){
	
	Route::get('dashboard', 'AuthorController@index')->name('dashboard');
	Route::get('book/{room}','AuthorController@bookNow')->name('bookpage');
	Route::post('booking','AuthorController@bookingRoom')->name('booking');
	Route::post('booking/{id}','AuthorController@bookingRoom')->name('booking.show');

	Route::get('profile','DashboardController@profile')->name('profile');
	Route::put('update-profile','DashboardController@updateProfileData')->name('profile.update');
	Route::put('update-password','DashboardController@updatePassword')->name('password.update');
});