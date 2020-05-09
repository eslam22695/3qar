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
        return view('admin.feature.create');

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
            'title'  => 'required|max:191',
            'description'  => 'required',
            'icon'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.required' => 'حقل الاسم مطلوب',
            'title.max' => 'حقل الاسم أكبر من اللازم',
            'description.required' => 'حقل الوصف مطلوب',
            'icon.required' => 'حقل الصورة مطلوب',
            'icon.image' => 'حقل الصورة يجب أن يكون صورة',
            'icon.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'icon.max' => 'أقصى مساحة للصوره 2 ميجابايت',
        ]);

        $input = $request->all();

        if(isset($input['icon'])){
            $icon = $input['icon'];
            $destination = public_path('admin_assets/images/feature');
            $name = time().'.'.$icon->getClientOriginalExtension();
            $icon->move($destination,$name);
            $input['icon'] = $name;
        }
        if(Feature::count() === 3){
            Session::flash('success','لا يمكن إضافة اكثر من 3 مميزات');
        }else{
            Feature::create($input);
            Session::flash('success','تم الاضافه بنجاح');
        }
        
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
        $feature = Feature::find($id);

        return view('admin.feature.edit',compact('feature'));
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
            'title'  => 'required|max:191',
            'description'  => 'required',
            'icon'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.required' => 'حقل الاسم مطلوب',
            'title.max' => 'حقل الاسم أكبر من اللازم',
            'description.required' => 'حقل الوصف مطلوب',
            'icon.image' => 'حقل الصورة يجب أن يكون صورة',
            'icon.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'icon.max' => 'أقصى مساحة للصوره 2 ميجابايت',
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
