<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/consulta');

/**
 * Rotas para Dashboard
 * ===============================================================
 */

Route::prefix('consulta')->group(function(){
    Route::name('consulta.')->group(function(){
        Route::get('', 'ConsultaController@index')->name('index');
        Route::post('', 'ConsultaController@search')->name('search');
    });
});