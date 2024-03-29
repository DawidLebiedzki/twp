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
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(
    function () {
        Route::resource('/users', 'UserController');
    }
);
Auth::routes();

Route::group(['middleware' => ['auth']], function () {

Route::resource('drawings', 'DrawingController');
Route::resource('noticeboards', 'NoticeboardController');


    Route::group(['middleware' => ['role:admin']], function () {

        Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {


            Route::resource('/customers', 'CustomerController');
            Route::resource('/machines', 'MachineController');
            Route::resource('/shifts', 'ShiftController');
            Route::resource('/articles', 'ArticleController');
            Route::resource('/dashboards', 'DashboardController');
            Route::resource('/drawings', 'DrawingController');
            Route::resource('/operations', 'OperationController');
            Route::resource('/noticeboards', 'NoticeboardController');
        });

        

        Route::namespace('User')->prefix('users')->name('users.')->group(function () {
            Route::resource('/settings', 'UserSettingController');
            Route::resource('/shifts', 'UserShiftController');
            Route::resource('/drawings', 'UserDrawingController');
            Route::resource('/shift-handovers', 'UserShiftHandoverController');
            
        });
    });
});
