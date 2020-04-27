<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Attribute;
use App\AttributeFamily;
use App\AttributeValue;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::where('status',1)->orderBy('id','desc')->get();
        //$attributeFamily = AttributeFamily::where('status',1)->get();
        //$status = 0;
        return view('admin.attribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = AttributeFamily::where('status',1)->get();
        return view('admin.attribute.create',compact('families'));
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
            'family_id'  => 'required|exists:attribute_families,id',
            'icon'   => 'required',
            'attribute_value.*'   => 'required',
        ]);

        $input = $request->all();

        if(isset($input['icon'])){
            $icon = $input['icon'];
            $destination = public_path('admin_assets/images/attribute');
            $name = time().'.'.$icon->getClientOriginalExtension();
            $icon->move($destination,$name);
            $input['icon'] = $name;
        }

        $attribute = Attribute::create($input);

        for($i=0;$i<count($input['attribute_value']);$i++){
            $value = [
                'attribute_id' => $attribute->id,
                'value' => $input['attribute_value'][$i]
            ];
            AttributeValue::create($value);
        }

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
        $values = AttributeValue::where('attribute_id',$id)->get();
        $attribute = Attribute::find($id);

        //$attribute_families = AttributeFamily::find($id);
        //$status = 1;
        return view('admin.attribute.show',compact('values','attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $families = AttributeFamily::where('status',1)->get();
        $values = AttributeValue::where('attribute_id',$id)->get();
        return view('admin.attribute.edit',compact('values','attribute','families'));
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
        $this->validate(request(),[
            'name'  => 'required',
            'family_id'  => 'required|exists:attribute_families,id',
        ]);

        $input = $request->all();
        $attribute = Attribute::find($id);

        if(isset($input['icon'])){
            $path=$attribute['icon'];
            $icon = $input['icon'];
            $destination = public_path('admin_assets/images/attribute');
            if(file_exists($destination.' / '.$path)){
                unlink($destination.' / '.$path);
            }
            $name=time().'.'.$icon->getClientOriginalName();
            $icon->move($destination,$name);
            $input['icon']=$name;
        }

        $attribute->update($input);

        $values = AttributeValue::where('attribute_id',$id)->get();
        foreach($values as $value){
            $value->delete();
        }

        for($i=0;$i<count($input['attribute_value']);$i++){
            $value = [
                'attribute_id' => $id,
                'value' => $input['attribute_value'][$i]
            ];
            AttributeValue::create($value);
        }

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
        $delete =  Attribute::find($id);
        $delete->delete();
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->back();
    }

    public function delete_value($attribute_value_id){
        $delete =  AttributeValue::find($attribute_value_id);
        $delete->delete();
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->back();
    }
}
