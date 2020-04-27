<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return view('admin.feature.index',compact('features'));
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
            'title'  => 'required',
            'description'  => 'required',
            'icon'   => 'required',
        ]);

        $input = $request->all();

        if(isset($input['icon'])){
            $icon = $input['icon'];
            $destination = public_path('admin_assets/images/feature');
            $name = time().'.'.$icon->getClientOriginalExtension();
            $icon->move($destination,$name);
            $input['icon'] = $name;
        }

        Feature::create($input);
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
            'title'  => 'required',
            'description'  => 'required',
            'icon'   => 'nullable',
        ]);

        $input = $request->all();
        if($Feature = Feature::find($id)){
            if(isset($input['icon'])){
                $path=$Feature['icon'];
                $icon = $input['icon'];
                $destination = public_path('admin_assets/images/feature');
                if(file_exists($destination.' / '.$path)){
                    unlink($destination.' / '.$path);
                }
                $name=time().'.'.$icon->getClientOriginalName();
                $icon->move($destination,$name);
                $input['icon']=$name;
            }
            $Feature->update($input);
            Session::flash('success','تم التعديل بنجاح');
            return redirect()->back();
        }else{
            Session::flash('danger','لم يتم التعديل ');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  Feature::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
