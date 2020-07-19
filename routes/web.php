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

Route::bind('username', function ($value){
    return \App\User::where('id', $value)->orWhere('username', $value)->first();
});


Route::prefix('achievement')->namespace('achievement')->group(function (){
    Route::get('/{id}', 'AchievementController@show')->name('achievement.show');
    Route::post('/', 'AchievementController@store')->name('achievement.store');
    Route::put('/{id}', 'AchievementController@update');
    Route::delete('/{id}', 'AchievementController@destroy');
});



Route::get('/{username}', 'user\UserController@show')->name('user.show');
