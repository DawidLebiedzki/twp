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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('dashboards', 'DashboardController');

    Route::group(['prefix' => 'shift/depart'], function () {
        Route::get('/punching', 'ShiftController@showPunchingShift')->name('shift.punching');
        Route::get('/rolling', 'ShiftController@showRollingShift')->name('shift.rolling');
    });



    Route::group(['middleware' => ['role:admin']], function () {

        Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

            Route::resource('/users', 'UserController');
            Route::resource('/shifts', 'ShiftController');
            Route::resource('/customers', 'CustomerController');
        });

        Route::resource('drawings', 'DrawingController');
        Route::resource('machines', 'MachineController');
        Route::resource('articles', 'ArticleController');
        Route::resource('customers', 'CustomerController');
        Route::resource('shifts/handovers', 'ShiftHandoverController');
    });
});
