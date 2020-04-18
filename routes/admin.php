<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::resource('blog', 'admin\BlogContoller');
Route::resource('category', 'admin\CategoryContoller', ['except' => ['create','show','edit']]);
Route::resource('city', 'admin\CityContoller', ['except' => ['create','show','edit']]);
Route::resource('district', 'admin\DistrictContoller', ['except' => ['create','show','edit']]);
Route::resource('attribute_family', 'admin\AttributeFamilyContoller', ['except' => ['create','show','edit']]);
Route::resource('option_family', 'admin\OptionGroupContoller', ['except' => ['create','show','edit']]);
