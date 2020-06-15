<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Admin;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id','desc')->get();

        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.admin.create',compact('roles'));
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
            'password'  => 'required|min:6',
            'role'   => 'required|exists:roles,name'
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'email.required' => 'حقل البريد الالكترونى مطلوب',
            'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
            'email.unique' => 'البريد الالكترونى موجود مسبقا',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'حقل كلمة المرور على الأقل 6 حروف',
            'role.required' => 'حقل الدور مطلوب',
            'role.exists' => 'حقل الدور غير موجود',

        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $admin = Admin::create($input);
        $admin->assignRole($input['role']);
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
        $admin = Admin::find($id);
        return view('admin.admin.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();

        return view('admin.admin.edit',compact('admin','roles'));
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
            'password'  => 'nullable|min:6',
            'role'   => 'required|exists:roles,name'
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'email.required' => 'حقل البريد الالكترونى مطلوب',
            'email.email' => 'حقل البريد الالكترونى يجب أن يكون بريد الكترونى صالح',
            'email.unique' => 'البريد الالكترونى موجود مسبقا',
            'password.min' => 'حقل كلمة المرور على الأقل 6 حروف',
            'role.required' => 'حقل الدور مطلوب',
            'role.exists' => 'حقل الدور غير موجود',
        ]);

        $input = $request->all();

        $admin = Admin::find($id);

        if($input['password'] == null){
            $input['password'] = $admin->password;
        }

        $admin->update($input);
        $admin->assignRole($input['role']);

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
        $delete =  Admin::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
