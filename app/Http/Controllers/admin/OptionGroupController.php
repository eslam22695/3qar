<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\OptionGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $families = OptionGroup::where('status',1)->get();
            $cats = Category::where('status',1)->get();
            return view('admin.option_group.index',compact('families','cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.option_group.create');

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
                'name'  => 'required',
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
        $optionGroupID = OptionGroup::find($id);

        return view('admin.option_group.create',compact('optionGroupID'));
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
                'name' => 'required',
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
