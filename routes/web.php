<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::prefix('login')->group(function(){
    Route::name('login')->group(function(){
        Route::get('/', 'LoginController@index')->name('index');
        Route::post('/', 'LoginController@auth')->name('auth');
    });
});