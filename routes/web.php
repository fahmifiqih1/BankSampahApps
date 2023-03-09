<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',
], function(){
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
});


Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/' , 'dashboardController@index')->name('dahboard.index');
});

Route::group([
    'prefix' => 'users',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/' , 'UserController@index')->name('users.index');
    Route::get('/search' , 'UserController@search')->name('users.search');
    Route::get('/pdf' , 'UserController@pdf')->name('users.dompdf');
});

Route::group([
    'prefix' => 'trash',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/' , 'TrashController@index')->name('trash.index');
    Route::get('/search' , 'TrashController@search')->name('trash.search');
    Route::get('/create' , 'TrashController@create')->name('trash.create');
    Route::post('/' , 'TrashController@store')->name('trash.store');
    
    Route::get('/{id}/edit' , 'TrashController@edit')->name('trash.edit');
    Route::put('/{id}' , 'TrashController@update')->name('trash.update');
    Route::get('/{id}' , 'TrashController@destroy')->name('trash.destroy');
});

Route::group([
    'prefix' => 'collectors',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/' , 'CollectorController@index')->name('colllectors.index');
    Route::get('/search' , 'CollectorController@search')->name('colllectors.search');
    Route::get('/create' , 'CollectorController@create')->name('colllectors.create');
    Route::post('/' , 'CollectorController@store')->name('colllectors.store');
    
    Route::get('/{id}/edit' , 'CollectorController@edit')->name('colllectors.edit');
    Route::put('/{id}' , 'CollectorController@update')->name('colllectors.update');
    Route::get('/{id}' , 'CollectorController@destroy')->name('colllectors.destroy');
});

Route::group([
    'prefix' => 'transactions',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/search' , 'TransactionController@search')->name('transactions.search');

    Route::get('/' , 'TransactionController@index')->name('transactions.index');
    Route::get('/create' , 'TransactionController@create')->name('transactions.create');
    Route::get('/ceknorek' , 'TransactionController@ceknorek')->name('transactions.ceknorek');
    Route::post('/{id}' , 'TransactionController@store')->name('transactions.store');
});

Route::group([
    'prefix' => 'pulls',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/search' , 'PullController@search')->name('pulls.search');

    Route::get('/' , 'PullController@index')->name('pulls.index');
    Route::get('/create' , 'PullController@create')->name('pulls.create');
    Route::get('/ceknorek' , 'PullController@ceknorek')->name('pulls.ceknorek');
    Route::post('/{id}' , 'PullController@store')->name('pulls.store');
});

Route::group([
    'prefix' => 'sells',
    'middleware' => ['auth:admin']
], function(){
    Route::get('/search' , 'SellController@search')->name('pulls.search');

    Route::get('/' , 'SellController@index')->name('pulls.index');
    Route::get('/create' , 'SellController@create')->name('pulls.create');
    Route::get('/ceknorek' , 'SellController@ceknorek')->name('pulls.ceknorek');
    Route::post('/{id}' , 'SellController@store')->name('pulls.store');
});



Route::group([
    'prefix' => 'customer',
], function(){
    Route::get('/' , 'CustomerController@indexTransaction')->name('customer.indexTransaction');
});



