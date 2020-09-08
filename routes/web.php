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

Route::get('/', 'FrontendController@index');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::get('/home', 'DashboardController@index')->name('admin');
	Route::resource('users', 'UsersController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('listings', 'ListingsController');
});

Route::middleware('auth')->group( function() {
	Route::get('/user/profile', 'FrontendController@profile')->name('front.profile');
	Route::put('/user/profile/updatepass', 'UsersController@updatePassword')->name('user.password.update');
	Route::put('/user/listing/update/{listing}', 'ListingsController@update')->name('user.listing.update');
	Route::put('/user/profile/update/{user}', 'UsersController@update')->name('user.profile.update');
});

Route::get('connexion', function() {
	return view('login.login');
})->name('connexion');

Route::delete('/delete/photo', 'PhotosController@delete')->name('listing.photo.delete');

Route::get('/annuaire/categorie/{slug}', 'FrontendController@category')->name('front.category.single');
Route::get('/annuaire/{category_slug}/{id}', 'FrontendController@listing')->name('front.listing.single');


