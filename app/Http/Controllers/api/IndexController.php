<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

use App\Item;
use App\Setting;
use App\Contact;
use App\Service;
use App\ServiceRequest;
use App\Blog;

class IndexController extends Controller
{
    private $asset = '/admin_assets/images/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    { 
        $lat = $request['lat'];
        $lang = $request['lang'];
        
        $items = Item::select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lang ) - radians('.$lang.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance'))->having('distance', '<', 25)->orderBy('distance')->get();

        if(isset($items) && count($items)>0){
            $data['items'] = $items;
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

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
    public function blog()
    {
        $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
        $data = [];
        if(isset($blogs) && count($blogs)>0){
            for($i=0; $i<count($blogs); $i++){
                $data['blogs'][$i]['id'] = $blogs[$i]->id;
                $data['blogs'][$i]['title'] = $blogs[$i]->title;
                $data['blogs'][$i]['description'] = $blogs[$i]->description;
                $data['blogs'][$i]['image'] = url($this->asset.'blog/'.$blogs[$i]->image);
                
            }
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blog_details($id)
    {
        $blog = Blog::find($id);
        $data = [];
        $data['id'] = $blog->id;
        $data['title'] = $blog->title;
        $data['description'] = $blog->description;
        $data['content'] = $blog->content;
        $data['image'] = url($this->asset.'blog/'.$blog->image);

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }
}
