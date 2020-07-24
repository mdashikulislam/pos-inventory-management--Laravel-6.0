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
//Backend Route

Route::prefix('user')->namespace('Backend')->middleware('auth')->group(function (){
    Route::get('/view','UserController@view')->name('users.view');
    Route::get('/add','UserController@adduser')->name('user.add');
    Route::post('/store','UserController@store')->name('user.store');
    Route::get('/edit/{id}','UserController@edit')->name('user.edit');
    Route::post('/update/{id}','UserController@update')->name('user.update');
    Route::get('/delete/{id}','UserController@delete')->name('user.delete');
});
Route::prefix('profile')->namespace('Backend')->middleware('auth')->group(function (){
    Route::get('/view','ProfileController@view')->name('profile.view');
    Route::get('/edit/{id}','ProfileController@edit')->name('profile.edit');
    Route::post('/update/{id}','ProfileController@update')->name('profile.update');
    Route::get('/change_password','ProfileController@changePassword')->name('profile.change_password');
    Route::post('/password/update','ProfileController@passwordUpdate')->name('password.update');
});
