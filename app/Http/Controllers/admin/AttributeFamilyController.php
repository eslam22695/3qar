<?php

namespace App\Http\Controllers\admin;

use App\AttributeFamily;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class AttributeFamilyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:attribute_family-list|attribute_family-create|attribute_family-edit|attribute_family-delete', ['only' => ['index','show']]);
        $this->middleware('permission:attribute_family-create', ['only' => ['create','store']]);
        $this->middleware('permission:attribute_family-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:attribute_family-delete', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
            $families = AttributeFamily::orderBy('id','desc')->get();
            $cats = Category::where('status',1)->orderBy('id','desc')->get();
            return view('admin.attribute_family.index',compact('families','cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute_family.create');

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
            'name'  => 'required|max:191||unique:attribute_families,name',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'name.unique' => 'حقل الاسم موجود مسبقا',

        ]);


        $input = $request->all();

        AttributeFamily::create($input);
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
        $family = AttributeFamily::find($id);

        return view('admin.attribute_family.edit',compact('family'));
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
            'name'  => 'required|max:191||unique:attribute_families,name,'.$id,
        ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا',
        ]);

        $input = $request->all();
        if($families = AttributeFamily::find($id)){

            $families->update($input);
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
        if($families = AttributeFamily::find($id)){

            $families->delete();
            Session::flash('success','تم الحذف بنجاح');
            return redirect()->back();
        }else{
            Session::flash('danger','لم يتم الحذف ');
            return redirect()->back();
        }
    }
}
