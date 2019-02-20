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
    return redirect('/room');

});

// AUTH
// Route::auth();
// Route::get('/home', 'HomeController@index');

Route::resource('room', 'RoomController');
Route::resource('room.week', 'WeekController');
Route::resource('room.confiq', 'ConfiqController');
Route::resource('room.reservation', 'ReservationController');
