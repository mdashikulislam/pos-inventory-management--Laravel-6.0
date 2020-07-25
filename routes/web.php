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
    if (Auth::check()){
        return redirect()->route('home');
    }else{
       return  redirect()->route('login');
    }
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Backend Route

Route::namespace('Backend')->middleware('auth')->group(function (){
    Route::prefix('user')->group(function (){
        Route::get('/view','UserController@view')->name('users.view');
        Route::get('/add','UserController@adduser')->name('user.add');
        Route::post('/store','UserController@store')->name('user.store');
        Route::get('/edit/{id}','UserController@edit')->name('user.edit');
        Route::post('/update/{id}','UserController@update')->name('user.update');
        Route::get('/delete/{id}','UserController@delete')->name('user.delete');
    });
    Route::prefix('profile')->group(function (){
        Route::get('/view','ProfileController@view')->name('profile.view');
        Route::get('/edit/{id}','ProfileController@edit')->name('profile.edit');
        Route::post('/update/{id}','ProfileController@update')->name('profile.update');
        Route::get('/change_password','ProfileController@changePassword')->name('profile.change_password');
        Route::post('/password/update','ProfileController@passwordUpdate')->name('password.update');
    });
    Route::prefix('supplier')->group(function (){
        Route::get('/view','SupplierController@view')->name('supplier.view');
        Route::get('/add','SupplierController@add')->name('supplier.add');
        Route::post('/store','SupplierController@store')->name('supplier.store');
        Route::get('/edit/{id}','SupplierController@edit')->name('supplier.edit');
        Route::post('/update/{id}','SupplierController@update')->name('supplier.update');
        Route::get('/delete/{id}','SupplierController@delete')->name('supplier.delete');
    });
    Route::prefix('customer')->group(function (){
        Route::get('/view','CustomerController@index')->name('customer.view');
        Route::get('/add','CustomerController@add')->name('customer.add');
        Route::post('/store','CustomerController@store')->name('customer.store');
        Route::get('/edit/{id}','CustomerController@edit')->name('customer.edit');
        Route::post('/update/{id}','CustomerController@update')->name('customer.update');
        Route::get('/delete/{id}','CustomerController@delete')->name('customer.delete');
    });
    Route::prefix('unit')->group(function (){
        Route::get('/view','UnitController@index')->name('unit.view');
    });
});


