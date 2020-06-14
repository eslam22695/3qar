<?php

namespace App\Http\Controllers\admin;

use App\Item;
use App\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::orderBy('id','desc')->get();
        return view('admin.owner.index',compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owner.create');

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
                'name'  => 'required|max:191|unique:owners,name',
                'email'  => 'required|email|unique:owners,email',
                'phone'  => 'required|digits:11|unique:owners,phone'
            ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا',
                'email.required' => 'حقل البريد الالكترونى مطلوب',
                'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
                'email.unique' => 'البريد الالكترونى موجود مسبقا',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'phone.digits' => 'حقل رقم الجوال يجب يكون 11 رقم',
                'phone.unique' => 'حقل رقم الجوال موجود مسبقا',
            ]);


        $input = $request->all();

        Owner::create($input);
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
        $owner = Owner::find($id);
        $items = Item::where('owner_id',$id)->orderBy('id','desc')->get();
        return view('admin.owner.show',compact('owner','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::find($id);
        return view('admin.owner.edit',compact('owner'));
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
                'name'  => 'required|max:191|unique:owners,name',
                'email'  => 'required|email|unique:owners,email',
                'phone'  => 'required|digits:11|unique:owners,phone'
            ],[
                'name.required' => 'حقل الاسم مطلوب',
                'name.max' => 'حقل الاسم أكبر من اللازم',
                'name.unique' => 'حقل الاسم موجود مسبقا',
                'email.required' => 'حقل البريد الالكترونى مطلوب',
                'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
                'email.unique' => 'البريد الالكترونى موجود مسبقا',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'phone.digits' => 'حقل رقم الجوال يجب يكون 11 رقم',
                'phone.unique' => 'حقل رقم الجوال موجود مسبقا',
            ]);

        $input = $request->all();
        if($owner = Owner::find($id)){

            $owner->update($input);
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
        $delete =  Owner::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }


//    public function owner_item(Request $request)
//    {
//        $this->validate(request(),
//            [
//                'owner_id'  => 'required|exists:owners,id',
//            ],[
//                'owner_id.required' => 'حقل المالك مطلوب',
//                'owner_id.exists' => 'المالك غير موجودة',
//
//            ]);
//
//        $input = $request->all();
//
//        $owners = Owner::where('item_id',$input['item_id'])->get();
//
//        $items = Item::all();
//
//        return view('admin.owner.index',compact('owners','items'));
//    }


}
