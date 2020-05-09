<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\District;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('id','desc')->get();
        $cities = City::where('status',1)->orderBy('id','desc')->get();
        $status = 0;
        return view('admin.district.index',compact('districts','cities','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::where('status',1)->get();
        return view('admin.district.create',compact('cities'));

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
            'name'        => 'required|max:191|unique:districts,name',
            'city_id' => 'required|exists:cities,id',
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا',
                'city_id.required' => 'حقل المدينة  مطلوب',
                'city_id.exists' => 'المدينة غير موجودة',

        ]);


        $input = $request->all();

        District::create($input);
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
        //$id is id of city using city disticts route
        $districts = District::where('city_id',$id)->where('status',1)->orderBy('id','desc')->get();
        $city_district = City::find($id);
        $status = 1;
        return view('admin.district.index',compact('districts','city_district','status'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::find($id);
        $cities = City::where('status',1)->get();
        return view('admin.district.edit',compact('district','cities'));
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
            'name'    => 'required|unique:districts,name',
            'city_id' => 'required|exists:cities,id',
        ]);

        $input = $request->all();
        if($district = District::find($id)){

            $district->update($input);
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
        if($district = District::find($id)){

            $district->delete();
            Session::flash('success','تم الحذف بنجاح');
            return redirect()->back();
        }else{
            Session::flash('danger','لم يتم الحذف ');
            return redirect()->back();
        }
    }
}
