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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/transactions/create', 'TransactionController@create');

Route::post('/transactions/store', 'TransactionController@store');

Route::get('transactions/show', 'TransactionController@show');

Route::get('/analytics/month', 'showMonthController@index');

Route::post('/analytics/month', 'showMonthController@create');
