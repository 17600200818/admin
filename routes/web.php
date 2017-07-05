<?php
//login
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
