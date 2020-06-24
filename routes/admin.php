<?php

    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');

    //role
    Route::resource('role', 'admin\RoleController');

    //admin
    Route::resource('admin', 'admin\AdminController');

    //user
    Route::resource('user', 'admin\UserController');

    //blog
    Route::resource('blog', 'admin\BlogController');

    //category
    Route::resource('category', 'admin\CategoryController', ['except' => ['show']]);

    //location
    Route::resource('city', 'admin\CityController', ['except' => ['show']]);
    Route::resource('district', 'admin\DistrictController', ['except' => ['show']]);
    Route::resource('city_districts', 'admin\DistrictController', ['except' => ['create','index','edit']]);
    Route::get('get_districts','admin\CityController@district')->name('get_districts');

    //attribute
    Route::resource('attribute_family', 'admin\AttributeFamilyController', ['except' => ['show']]);
    //Route::resource('family_attribute', 'admin\AttributeFamilyController', ['except' => ['create','index','edit']]);
    Route::resource('attribute', 'admin\AttributeController');
    Route::get('attribute_value/{id}', 'admin\AttributeController@delete_value')->name('attribute_value.delete');

    //option
    Route::resource('option_group', 'admin\OptionGroupController', ['except' => ['create','show','edit']]);
    Route::resource('option', 'admin\OptionController', ['except' => ['show']]);

    //services
    Route::resource('services', 'admin\ServiceController', ['except' => ['show']]);

    //owner
    Route::resource('owner', 'admin\OwnerController');

    //settings
    Route::resource('setting', 'admin\SettingController', ['except' => ['create','show','edit']]);

    //contacts
    Route::resource('contact', 'admin\ContactController', ['only' => ['index','show']]);

    //feature
    Route::resource('feature', 'admin\FeatureController', ['except' => ['show']]);

    //service_request
    Route::resource('service_request', 'admin\ServiceRequestController', ['only' => ['index','show']]);

    //item
    Route::resource('item', 'admin\ItemController');
    Route::get('item_family/{family_id}','admin\ItemController@item_family')->name('item_family');
    Route::delete('delete_image/{image_id}','admin\ItemController@delete_image')->name('delete_image');

    //Report

    /*District*/
    Route::get('report/district','admin\ReportController@district')->name('district_report');
    Route::post('report/district','admin\ReportController@district_report')->name('district_report');

    /*attribute*/
    Route::get('report/attribute','admin\ReportController@attribute')->name('attribute_report');
    Route::post('report/attribute','admin\ReportController@attribute_report')->name('attribute_report');

    /*item*/
    Route::get('report/item','admin\ReportController@item')->name('item_report');
    Route::post('report/item','admin\ReportController@item_report')->name('item_report');

    /*item_click*/
    Route::get('report/item_click','admin\ReportController@item_click')->name('item_click');

    /*item_favourite*/
    Route::get('report/item_favourite','admin\ReportController@item_favourite')->name('item_favourite');

    //Notify
    Route::get('notify_monthly','admin\NotifyController@index')->name('notify_monthly');
    Route::post('notify_monthly_send','admin\NotifyController@store')->name('notify_monthly_send');

    Route::get('notify_all','admin\NotifyController@index')->name('notify_all');
    Route::post('notify_all_send','admin\NotifyController@store')->name('notify_all_send');
    
    //Global Status Route
    Route::get('status/{status}/{db}/{id}','admin\SettingController@status')->name('status');