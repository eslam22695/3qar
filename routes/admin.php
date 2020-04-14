<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::resource('category', 'admin\CategoryContoller', ['except' => ['create','show','edit']]);
Route::resource('city', 'admin\CityContoller', ['except' => ['create','show','edit']]);
