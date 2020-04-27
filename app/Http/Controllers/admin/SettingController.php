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
    public function destroy($id)
    {
        //
    }
}
