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
use App\ItemAttribute;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::orderBy('id','desc')->get();
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
            'name'  => 'required|max:191|unique:attributes,name',
            'family_id'  => 'required|exists:attribute_families,id',
            'icon'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attribute_value.*'   => 'required',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'name.unique' => 'حقل الاسم موجود مسبقا',
            'family_id.required' => 'حقل عائلة الخصائص مطلوب',
            'family_id.exists' => 'عائلة الخصائص غير موجودة',
            'icon.required' => 'حقل الصورة مطلوب',
            'icon.image' => 'حقل الصورة يجب أن يكون صورة',
            'icon.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'icon.max' => 'أقصى مساحة للصوره 2 ميجابايت',
            'attribute_value.required' => 'يجب إدخال قيمة على الاقل',
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
            'name'  => 'required|max:191',
            'family_id'  => 'required|exists:attribute_families,id',
            'icon'   => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'family_id.required' => 'حقل عائلة الخصائص مطلوب',
            'family_id.exists' => 'عائلة الخصائص غير موجودة',
            'icon.image' => 'حقل الصورة يجب أن يكون صورة',
            'icon.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'icon.max' => 'أقصى مساحة للصوره 2 ميجابايت',
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

        /* $values = AttributeValue::where('attribute_id',$id)->get();
        $value_ids = [];
        $j = 0;
        foreach($values as $value){
            $value_ids[$j] = $value->id;
            $value->delete();
            $j = $j+1;
        } */

        for($i=0;$i<count($input['attribute_value']);$i++){
            
            if(isset($input['attribute_value_id'][$i])){
                $AttributeValue = AttributeValue::find($input['attribute_value_id'][$i]);
                $AttributeValue->value = $input['attribute_value'][$i];
                $AttributeValue->update();
            }else{
                $value = [
                    'attribute_id' => $id,
                    'value' => $input['attribute_value'][$i]
                ];
                AttributeValue::create($value);
            }
            
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
