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

// Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/home', 'HomeController@index')->name('index');
Auth::routes();
Route::get('/logout','HomeController@logOut');


// Admin Route Start
Route::get('admins/dashboard', 'AdminController@index')->name('dashboard');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');



// User Route Start
Route::get('users/homepage', 'UserController@homepage')->name('homepage');
// Route::get('users/show', 'UserController@homepage')->name('show');
Route::resource('users','UserController');

//Products Start here
Route::resource('products','ProductsController');
