<?php

Route::get('dashboard', 'DashboardController')->name('dashboard');
Route::resource('categorias', 'CategoryController');
Route::resource('carros', 'CarController');


