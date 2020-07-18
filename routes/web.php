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

Route::bind('user', function ($value){
    return \App\User::where('id', $value)->orWhere('username', $value)->first();
});

Route::get('/{username}', 'user\UserController@show');

Route::prefix('achievement')->namespace('achievement')->group(function (){
    Route::get('/{id}', 'AchievementController@show');
    Route::post('/', 'AchievementController@store');
    Route::put('/{id}', 'AchievementController@update');
    Route::delete('/{id}', 'AchievementController@destroy');
});
