<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'api\AuthController@login');
Route::post('register', 'api\AuthController@register');

Route::get('home', 'api\IndexController@home');
Route::get('category/{id}', 'api\IndexController@category');
Route::get('items', 'api\IndexController@items');
Route::get('item/{id}', 'api\IndexController@item');
Route::get('district/{id}', 'api\IndexController@district');

Route::get('featured', 'api\IndexController@featured');
Route::get('categories', 'api\IndexController@categories');
Route::get('cities', 'api\IndexController@cities');
Route::get('about', 'api\IndexController@about');
Route::get('contact', 'api\IndexController@contact');
Route::post('contact_form', 'api\IndexController@contact_form');
Route::get('services', 'api\IndexController@services');
Route::post('service_request', 'api\IndexController@service_request');
Route::get('blog', 'api\IndexController@blog');
Route::get('blog_details/{id}', 'api\IndexController@blog_details');

Route::get('filter', 'api\IndexController@filter');


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('fav/{id}', 'api\IndexController@fav');
    Route::get('item_contacted', 'api\IndexController@item_contacted');
    Route::get('item_favourite', 'api\IndexController@item_favourite');
    Route::post('edit_profile', 'api\IndexController@edit_profile');
});
