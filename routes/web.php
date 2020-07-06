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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/users', 'Admin\UserController', ['except' => 'show']);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::resource('/users', 'UserController', ['except' => 'show']);
    Route::resource('/shift', 'ShiftController', ['except' => 'show']);
});

Route::get('/shift/depart/punching', 'ShiftController@showPunchingShift')->name('shift.punching');
Route::get('/shift/depart/rolling', 'ShiftController@showRollingShift')->name('shift.rolling');

Route::get('/qm/requali', 'QualityManagement\Requalification@index')->name('requali.index');
