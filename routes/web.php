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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UsersController')->middleware('auth');
Route::resource('departaments','DepartamentsController')->middleware('auth');
Route::get('/root',function(){
    echo storage_path();
});
Route::get('/url',function (){
 print_r(Storage::disk('local')->exists('phpVQfHO5.jpg'));
    
});

Route::get('/images',function(){
    
});
