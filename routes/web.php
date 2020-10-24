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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.admin'); 

    // User
    Route::resource('user', 'UserController')->except([
        'index', 'edit', 'update', 'destroy'
    ]);

    // Attendance
    Route::resource('attendance', 'AttendanceController')->except([
        'create', 'store', 'edit', 'update', 'destroy'
    ]);

    // Absence
    Route::resource('absence', 'LeaveController')->except([
        'create', 'store', 'edit', 'update', 'destroy'
    ]);

    Route::get('absence/attachment/download/{id}/{filename}', 'LeaveController@download')->name('attachment.download');
});

Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {

    // Attendance
    Route::get('attendance', 'AttendanceController@create')->name('user.attendance');
    Route::post('attendance/check-in', 'AttendanceController@checkIn')->name('user.check-in');
    Route::post('attendance/check-out', 'AttendanceController@checkOut')->name('user.check-out');

    // Absence
    Route::resource('leave', 'LeaveController')->except([
        'index', 'edit', 'update', 'destroy'
    ]);
});
