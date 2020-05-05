<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

use App\Setting;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    { 
        $setting = Setting::first();
        if(isset($setting) && count($setting)>0){
            $data['about_text'] = $setting->main_about;
            $data['about_image'] = $setting->about_image;
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $setting = Setting::first();
        if(isset($setting) && count($setting)>0){
            $data['phone1'] = $setting->phone1;
            $data['phone2'] = $setting->phone2;
            $data['address'] = $setting->address;
            $data['email'] = $setting->email;
            $data['map'] = $setting->map;
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
