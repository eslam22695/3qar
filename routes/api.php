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

Route::get('about', 'api\IndexController@about');
Route::get('contact', 'api\IndexController@contact');
Route::post('contact_form', 'api\IndexController@contact_form');
Route::get('services', 'api\IndexController@services');
Route::post('service_request', 'api\IndexController@service_request');
Route::get('blog', 'api\IndexController@blog');
Route::get('blog_details/{id}', 'api\IndexController@blog_details');



/* Route::group(['middleware' => 'auth:api'], function(){

}); */
