<?php

Route::get('', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::delete('/eliminar/{id}', 'HomeController@eliminar')->name('peliculas.eliminar');

Route::post('/', 'HomeController@agregar')->name('peliculas.agregar');

Route::get('/buscar', 'HomeController@search')->name('busqueda');

Auth::routes();



