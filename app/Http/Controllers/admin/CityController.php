<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id','desc')->get();
        return view('admin.city.index',compact('cities'));
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
            'name'  => 'required|max:191|unique:cities,name',

        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا'
        ]);


        $input = $request->all();

        City::create($input);
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
            'name'  => 'required|max:191|unique:cities,name',

        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا'
        ]);

        $input = $request->all();
        if($city = City::find($id)){

            $city->update($input);
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
        if($city = City::find($id)){

            $city->delete();
            Session::flash('success','تم الحذف بنجاح');
            return redirect()->back();
        }else{
            Session::flash('danger','لم يتم الحذف ');
            return redirect()->back();
        }
    }

    /**
     * District Ajax
     */
    public function district(Request $request)
    {
        $districts = DB::table('districts')->where('city_id',$request->city_id)->pluck("name","id")->all();
        return response()->json($districts);
    }
}
