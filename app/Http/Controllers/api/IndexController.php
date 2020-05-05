<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

use App\Setting;
use App\Contact;
use App\Service;
use App\ServiceRequest;

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
    public function contact_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'يرجى إضافة الاسم',
            'email.required' => 'يرجى إضافة البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكترونى صحيح',
            'phone.required' => 'يرجى إضافة رقم الجوال',
            'message.required' => 'يرجى إضافة الرسالة',            
        ]);

        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 401);
        }

        $input = $request->all();
        Contact::create($input);

        return response([
            'status'    =>      'success',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        $services = Service::where('status',1)->get();
        if(isset($services) && count($services)>0){
            $data['services'] = $services;
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function service_request()
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'service_id'  => 'required|exists:services,id',
        ],[
            'name.required' => 'يرجى إضافة الاسم',
            'email.required' => 'يرجى إضافة البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكترونى صحيح',
            'phone.required' => 'يرجى إضافة رقم الجوال',
            'message.required' => 'يرجى إضافة الرسالة',            
            'service_id.required' => 'يرجى إختيار خدمة',            
            'service_id.exists' => 'الخدمة غير موجودة',            
        ]);

        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 401);
        }

        $input = $request->all();
        ServiceRequest::create($input);

        return response([
            'status'    =>      'success',
        ], 200);
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
