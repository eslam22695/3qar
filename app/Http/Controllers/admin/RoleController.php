<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','show']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','desc')->get();

        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
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
            'permissions.*'  => 'required|integer|distinct',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
        ]);

        $input = [];

        if(!isset($request->permissions) || $request->permissions == null){
            Session::flash('danger','يرجى أختيار احد الاذون');
            return redirect()->back();
        }

        $input['name'] = $request->name;
        $input['guard_name'] = 'admin';

        $permissions = $request->permissions;

        $role = Role::create($input);

        $role->syncPermissions($permissions);

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
        $permissions = [];
        $role = Role::find($id);
        $permission_role = DB::table('role_has_permissions')->where('role_id',$id)->get();
        for($i=0; $i<count($permission_role); $i++){
            $permission[$i] = Permission::find($permission_role[$i]->permission_id);
            $permissions[$i] = [
                'name'  =>  $permission[$i]->name
            ];
        }
        return view('admin.role.show',compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::orderBy('id','desc')->get();
        return view('admin.role.edit',compact('role','permissions'));
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
            'permissions.*'  => 'required',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'permissions.required' => 'يرجي إختيار أذن و احد على الاقل ',
        ]);

        $input = [];

        if(!isset($request->permissions) || $request->permissions == null){
            Session::flash('danger','يرجى أختيار احد الاذون');
            return redirect()->back();
        }

        $input['name'] = $request->name;

        $permissions = $request->permissions;

        $role = Role::find($id);

        $role->update($input);

        $role->syncPermissions($permissions);

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
        $delete =  Role::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
