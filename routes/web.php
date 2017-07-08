<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route guest & home
Route::get('/','GuestController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/test', 'test@index');

//Route Admin
Route::group(['middleware'=>'web'],function(){
	Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function() {
	Route::resource('authors','AuthorsContoller');
	Route::resource('books','BooksController');
	Route::resource('members','MembersController');
	Route::get('statistics',[
		'as'=>'statistics.index',
		'uses'=>'StatisticsController@index'
		]);
});
});
//Route User Member
Route::get('books/{book}/borrow',[
	'middleware'=>['auth','role:member'],
	'as' => 'guest.books.borrow',
	'uses' => 'BooksController@borrow'
	]);
Route::put('books/{book}/return',[
	'middleware'=>['auth','role:member'],
	'as' => 'member.books.return',
	'uses' => 'BooksController@returnBack'
	]);
//Route profile
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile','SettingsController@updateProfile');
//Route ubah password 
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password','SettingsController@updatePassword');
//Route verifikasi
Route::get('auth/verify/{token}','Auth\RegisterController@verify');
Route::get('auth/send-verification','Auth\RegisterController@sendVerification');

