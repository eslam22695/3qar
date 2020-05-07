<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->get();

        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name'  => 'required|max:191',
            'email'  => 'required|email|unique:users',
            'phone'  => 'required',
            'password'  => 'required|min:6',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'email.required' => 'حقل البريد الالكترونى مطلوب',
            'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
            'email.unique' => 'البريد الالكترونى موجود مسبقا',
            'phone.required' => 'حقل رقم الجوال مطلوب',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'حقل كلمة المرور على الأقل 6 حروف',

        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
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
        $user = User::find($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
            'name'  => 'required|max:191',
            'email'  => 'required|email|unique:users,email,'.$id,
            'phone'  => 'required',
            'password'  => 'nullable|min:6',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'email.required' => 'حقل البريد الالكترونى مطلوب',
            'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
            'email.unique' => 'البريد الالكترونى موجود مسبقا',
            'phone.required' => 'حقل رقم الجوال مطلوب',
            'password.min' => 'حقل كلمة المرور على الأقل 6 حروف',

        ]);

        $input = $request->all();

        $user = User::find($id);

        if($input['password'] == null){
            $input['password'] = $user->password;
        }

        $user->update($input);
        
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
        $delete =  User::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
