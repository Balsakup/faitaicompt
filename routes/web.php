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

Route::get('/inscription', 'UsersController@register')->name('users.register');
Route::post('/inscription', 'UsersController@store')->name('users.store');
Route::post('/deconnexion', 'UsersController@logout')->name('users.logout');
Route::get('/connexion', 'UsersController@login')->name('users.login');
Route::post('/connexion', 'UsersController@authenticate')->name('users.authenticate');

Route::get('/', 'PagesController@index')->name('pages.index');

Route::get('/comptes', 'AccountsController@index')->name('accounts.index');
Route::get('/comptes/creer', 'AccountsController@create')->name('accounts.create');
Route::post('/comptes', 'AccountsController@store')->name('accounts.store');
Route::get('/comptes/{id}', 'AccountsController@show')->name('accounts.show');
Route::get('/comptes/{id}/modifier', 'AccountsController@edit')->name('accounts.edit');
Route::match([ 'put', 'patch' ], '/comptes/{id}', 'AccountsController@update')->name('accounts.update');
Route::delete('/comptes/{id}', 'AccountsController@destroy')->name('accounts.destroy');

Route::get('/transactions', 'TransactionsController@index')->name('transactions.index');
Route::get('/transactions/creer', 'TransactionsController@create')->name('transactions.create');
Route::post('/transactions', 'TransactionsController@store')->name('transactions.store');
Route::get('/transactions/{id}', 'TransactionsController@show')->name('transactions.show');
Route::get('/transactions/{id}/modifier', 'TransactionsController@edit')->name('transactions.edit');
Route::match([ 'put', 'patch' ], '/transactions/{id}', 'TransactionsController@update')->name('transactions.update');
Route::delete('/transactions/{id}', 'TransactionsController@destroy')->name('transactions.destroy');
