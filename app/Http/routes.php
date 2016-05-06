<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('teste', 'DomTeste@teste');

Route::get('/home', 'HomeController@index');
Route::resource('filme', 'FilmesController');
