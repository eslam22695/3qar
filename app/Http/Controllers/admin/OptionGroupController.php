<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\OptionGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class OptionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $families = OptionGroup::orderBy('id','desc')->get();
            $cats = Category::orderBy('id','desc')->get();
            return view('admin.option_group.index',compact('families','cats'));
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
                'name'  => 'required|max:191|unique:option_groups,name',
            ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا',
            ]);


        $input = $request->all();

        OptionGroup::create($input);
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
                'name'  => 'required|max:191|unique:option_groups,name',
            ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا',
            ]);

        $input = $request->all();
        if($optionGroup = OptionGroup::find($id)){

            $optionGroup->update($input);
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
        $delete =  OptionGroup::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
