<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home.index');
});
Route::resource('home', 'HomeController');
Route::resource('debt', 'DebtController');
Route::get('debt/{id}/berikan', 'DebtController@give')->name('debt.give');
Route::get('debt/{id}/terima', 'DebtController@accept')->name('debt.accept');
Route::post('debt-detail', 'DebtController@detail_store')->name('debt-detail.store');
Route::resource('debtor', 'DebtorController');
Route::resource('users', 'UserController');
Route::put('users/resetpassword/{id}', 'UserController@reset_password')->name('users.resetpassword');