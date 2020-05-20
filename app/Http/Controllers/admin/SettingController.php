<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone1'            => 'nullable|numeric',
            'phone2' => 'nullable|numeric',
            'email' => 'nullable|email',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'android' => 'nullable|url',
            'apple' => 'nullable|url',
        ],[
            'logo.image' => 'حقل اللوجو يجب أن يكون صورة',
            'logo.mimes' => 'حقل اللوجو يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'about_image.image' => 'حقل صورة من نحن يجب أن يكون صورة',
            'about_image.mimes' => 'حقل صورة من نحن يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'phone1.numeric' => 'حقل رقم الجوال 1 يجب أن يكون رقم',
            'phone2.numeric' => 'حقل رقم الجوال 2 يجب أن يكون رقم',
            'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
            'facebook.url' => 'حقل الفيسبوك يجب أن يكون رابط',
            'twitter.url' => 'حقل تويتر يجب أن يكون رابط',
            'linkedin.url' => 'حقل لينكدأن يجب أن يكون رابط',
            'instagram.url' => 'حقل انستجرام يجب أن يكون رابط',
            'youtube.url' => 'حقل يوتيوب يجب أن يكون رابط',
            'android.url' => 'حقل رابط تطبيق الاندرويد يجب أن يكون رابط',
            'apple.url' => 'حقل رابط تطبيق الايفون يجب أن يكون رابط',

        ]);

        $input = $request->all();

        if(isset($input['logo'])){
            $logo = $input['logo'];
            $destination = public_path('admin_assets/images/setting');
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move($destination,$name);
            $input['logo'] = $name;
        }

        if(isset($input['about_image'])){
            $about_image = $input['about_image'];
            $destination = public_path('admin_assets/images/setting');
            $name = time().'.'.$about_image->getClientOriginalExtension();
            $about_image->move($destination,$name);
            $input['about_image'] = $name;
        }

        Setting::create($input);
        Session::flash('success','تم الاضافه بنجاح');
        return redirect()->back();
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
        $this->validate(request(),
        [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone1' => 'nullable|numeric',
            'phone2' => 'nullable|numeric',
            'email' => 'nullable|email',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'android' => 'nullable|url',
            'apple' => 'nullable|url',
        ],[
            'logo.image' => 'حقل اللوجو يجب أن يكون صورة',
            'logo.mimes' => 'حقل اللوجو يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'about_image.image' => 'حقل صورة من نحن يجب أن يكون صورة',
            'about_image.mimes' => 'حقل صورة من نحن يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'phone1.numeric' => 'حقل رقم الجوال 1 يجب أن يكون رقم',
            'phone2.numeric' => 'حقل رقم الجوال 2 يجب أن يكون رقم',
            'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
            'facebook.url' => 'حقل الفيسبوك يجب أن يكون رابط',
            'twitter.url' => 'حقل تويتر يجب أن يكون رابط',
            'linkedin.url' => 'حقل لينكدأن يجب أن يكون رابط',
            'instagram.url' => 'حقل انستجرام يجب أن يكون رابط',
            'youtube.url' => 'حقل يوتيوب يجب أن يكون رابط',
            'android.url' => 'حقل رابط تطبيق الاندرويد يجب أن يكون رابط',
            'apple.url' => 'حقل رابط تطبيق الايفون يجب أن يكون رابط',

        ]);

        $input = $request->all();
        
        if(isset($input['logo'])){
            $path=$attribute['logo'];
            $logo = $input['logo'];
            $destination = public_path('admin_assets/images/setting');
            if(file_exists($destination.' / '.$path)){
                unlink($destination.' / '.$path);
            }
            $name=time().'.'.$logo->getClientOriginalName();
            $logo->move($destination,$name);
            $input['logo']=$name;
        }

        if(isset($input['about_image'])){
            $path=$attribute['about_image'];
            $about_image = $input['about_image'];
            $destination = public_path('admin_assets/images/setting');
            if(file_exists($destination.' / '.$path)){
                unlink($destination.' / '.$path);
            }
            $name=time().'.'.$about_image->getClientOriginalName();
            $about_image->move($destination,$name);
            $input['about_image']=$name;
        }

        $Setting = Setting::find($id);
        $Setting->update($input);
        Session::flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($status,$db,$id)
    {
        $status == 0 ? $status = 1 : $status = 0;
        DB::table($db)->where('id',$id)->update(['status' => $status]);
        Session::flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }
}
