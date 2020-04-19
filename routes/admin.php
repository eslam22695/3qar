<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::resource('user', 'admin\UserController');
Route::resource('blog', 'admin\BlogController');
Route::resource('attribute', 'admin\AttributeController');
Route::resource('category', 'admin\CategoryController', ['except' => ['create','show','edit']]);
Route::resource('city', 'admin\CityController', ['except' => ['create','show','edit']]);
Route::resource('district', 'admin\DistrictController', ['except' => ['create','show','edit']]);
Route::resource('attribute_family', 'admin\AttributeFamilyController', ['except' => ['create','show','edit']]);
Route::resource('option_group', 'admin\OptionGroupController', ['except' => ['create','show','edit']]);
Route::resource('option', 'admin\OptionController', ['except' => ['create','show','edit']]);
