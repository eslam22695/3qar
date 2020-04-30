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
Route::get('get_districts','admin\CityController@district')->name('get_districts');

//attribute
Route::resource('attribute_family', 'admin\AttributeFamilyController', ['except' => ['create','show','edit']]);
//Route::resource('family_attribute', 'admin\AttributeFamilyController', ['except' => ['create','index','edit']]);
Route::resource('attribute', 'admin\AttributeController');
Route::get('attribute_value/{id}', 'admin\AttributeController@delete_value')->name('attribute_value.delete');

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

//item
Route::resource('item', 'admin\ItemController');
Route::get('item_family/{family_id}','admin\ItemController@item_family')->name('item_family');
Route::delete('delete_image/{image_id}','admin\ItemController@delete_image')->name('delete_image');