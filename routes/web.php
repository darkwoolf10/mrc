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
    return view('welcome');
});

Auth::routes();

Route::resource('player', 'PlayerController')->middleware('auth');
Route::get('/stat', 'StatController@stat')->name('stat');
Route::get('/stat/getData', 'StatController@getData')->name('getStatData');


Route::post('comment/store', 'CommentsController@store')->name('comment.store');
Route::post('comment/delete/{id}', 'CommentsController@destroy')->name('comment.destroy');

