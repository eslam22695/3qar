<?php

// This class file to define all general functions

namespace App\Helpers;

use App;
use Illuminate\Support\Str;
use Auth;

use App\Category;
use App\City;

class Helper
{
    //Get All Categories
    static function cats(){
        $cats = Category::where('status',1)->get();
        return $cats;
    }

    //Get All Cities
    static function cities(){
        $cities = City::where('status',1)->get();
        return $cities;
    }
}