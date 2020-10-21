<?php

Route::get('dashboard', 'DashboardController')->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::resource('categorias', 'CategoriesController');
    Route::resource('produtos', 'ProductsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('You have successfully logged out!');
})->name('logout');

