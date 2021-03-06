<?php
//login
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
//Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController@index');
    Route::post('/advertisers/editStatus', 'AdvertisersController@editStatus')->name('advertisers.editStatus');
    Route::post('/advertiserFiles', 'AdvertiserFilesController@store')->name('advertiserFiles.store');
    Route::post('/categories/getCategory2', 'CategoriesController@getCategory2')->name('categories.getCategory2');

    Route::resource('advertisers', 'AdvertisersController');
    Route::resource('creatives', 'CreativesController');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
