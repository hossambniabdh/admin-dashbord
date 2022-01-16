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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('employee', EmployeeController::class)->middleware('auth');
Route::resource('company', CompanyController::class)->middleware('auth');
Route::get('/update', 'EmployeeController@update')->name('update');
Route::get('/delete', 'EmployeeController@destroy')->name('delete');

Route::get('/updatecom', 'CompanyController@update')->name('updatecom');
Route::get('/deletecom', 'CompanyController@destroy')->name('deletecom');
