<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::prefix('login')->group(function(){
    Route::name('login.')->group(function(){
        Route::get('/', 'LoginController@index')->name('index');
        Route::post('/', 'LoginController@auth')->name('auth');
    });
});

/**
 * Rotas para Dashboard
 * ===============================================================
 */
Route::get('/consulta', 'ConsultaController@index')->name('consulta.index');

Route::post('/consulta', 'ConsultaController@search')->name('consulta.search');
// Route::get('/consulta/{id}', 'ConsultaController@details')->name('consulta.details');