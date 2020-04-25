<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

//user
Route::resource('user', 'admin\UserController');

//blog
Route::resource('blog', 'admin\BlogController');

//category
Route::resource('category', 'admin\CategoryController', ['except' => ['create','show','edit']]);

//location
Route::resource('city', 'admin\CityController', ['except' => ['create','show','edit']]);
Route::resource('district', 'admin\DistrictController', ['except' => ['create','show','edit']]);
Route::resource('city_districts', 'admin\DistrictController', ['except' => ['create','index','edit']]);

//attribute
Route::resource('attribute_family', 'admin\AttributeFamilyController', ['except' => ['create','show','edit']]);
Route::resource('attribute', 'admin\AttributeController');

//option
Route::resource('option_group', 'admin\OptionGroupController', ['except' => ['create','show','edit']]);
Route::resource('option', 'admin\OptionController', ['except' => ['create','show','edit']]);

//services
Route::resource('services', 'admin\ServiceController', ['except' => ['create','show','edit']]);

//owner
Route::resource('owner', 'admin\OwnerController');

//settings
Route::resource('setting', 'admin\SettingController', ['except' => ['create','show','edit']]);

//contacts
Route::resource('contact', 'admin\ContactController', ['only' => ['index','show']]);

//feature
Route::resource('feature', 'admin\FeatureController', ['except' => ['create','show','edit']]);

//service_request
Route::resource('service_request', 'admin\ServiceRequestController', ['only' => ['index','show']]);
