<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Item;
use App\Category;
use App\AttributeFamily;
use App\Attribute;
use App\AttributeValue;
use App\City;
use App\District;
use App\Option;
use App\Owner;
use App\ItemAttribute;
use App\ItemOption;
use App\ItemImage;
use App\User;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:item-list|item-create|item-edit|item-delete', ['only' => ['index','show']]);
        $this->middleware('permission:item-create', ['only' => ['create','store']]);
        $this->middleware('permission:item-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:item-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('id','desc')->get();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = AttributeFamily::where('status',1)->orderBy('id','desc')->get();
        return view('admin.item.create',compact('families'));
    }

    /**
     * Display the rest of create form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function item_family($family_id){
        $cats = Category::where('status',1)->orderBy('id','desc')->get();
        $cities = City::where('status',1)->orderBy('id','desc')->get();
        $attributes = Attribute::where('family_id',$family_id)->where('status',1)->orderBy('id','desc')->get();
        $options = Option::where('status',1)->orderBy('id','desc')->get();
        $owners = Owner::where('status',1)->orderBy('id','desc')->get();
        return view('admin.item.complete_create',compact('cats','cities','attributes','options','owners'));
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
            'description'  => 'required',
            'price'  => 'required',
            'main_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'phone'  => 'required|digits:11',
            'area'  => 'required',
            'district_id'  => 'required|exists:districts,id',
            'city_id'  => 'required|exists:cities,id',
            'category_id'  => 'required|exists:categories,id',
            'owner_id'  => 'required|exists:owners,id',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'description.required' => 'حقل الوصف  مطلوب',
            'price.required' => 'حقل السعر  مطلوب',
            'main_image.required' => 'حقل الصورة مطلوب',
            'main_image.image' => 'حقل الصورة يجب أن يكون صورة',
            'main_image.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'main_image.max' => 'أقصى مساحة للصوره 2 ميجابايت',
            'phone.required' => 'حقل رقم الجوال مطلوب',
            'phone.digits' => 'حقل رقم الجوال يجب يكون 11 رقم',
            'area.required' => 'حقل المنطقة مطلوب',

            'district_id.required' => 'حقل الاحياء مطلوب',
            'district_id.exists' => 'الاحياء غير موجودة',
            'city_id.required' => 'حقل المدينة مطلوب',
            'city_id.exists' => 'المدينة غير موجودة',
            'category_id.required' => 'حقل القسم  مطلوب',
            'category_id.exists' => 'القسم غير موجودة',
            'owner_id.required' => 'حقل المالك مطلوب',
            'owner_id.exists' => 'المالك غير موجودة',
        ]);

        $input = $request->all();

        if(isset($input['main_image'])){
            $image = $input['main_image'];
            $destination = public_path('admin_assets/images/item');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move($destination,$name);
            $input['main_image'] = $name;
        }

        $item = Item::create($input);

        for($v=0;$v<count($input['values']);$v++){
            $values = [
                'attribute_value_id' => $input['values'][$v],
                'item_id' => $item->id
            ];
            ItemAttribute::create($values);
        }

        for($o=0;$o<count($input['options']);$o++){
            $options = [
                'option_id' => $input['options'][$o],
                'item_id' => $item->id
            ];
            ItemOption::create($options);
        }

        if(isset($input['images'])){
            for($i = 0; $i < count($input['images']); $i++){

                if($input['images'][$i]){
                    $image = $input['images'][$i];
                    $destination = public_path('admin_assets/images/item');
                    $name = time().$item->id.$i.'images.'.$image->getClientOriginalExtension();
                    $image->move($destination,$name);
                    $input['images'][$i] = $name;
                }

                $images = [
                    'image' => $input['images'][$i],
                    'item_id' => $item->id
                ];
                ItemImage::create($images);
            }
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
        $item = Item::find($id);
        $attributes = ItemAttribute::where('item_id',$id)->where('status',1)->get();
        $options = ItemOption::where('item_id',$id)->where('status',1)->get();
        $images = ItemImage::where('item_id',$id)->where('status',1)->get();
        return view('admin.item.show',compact('item','attributes','options','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   
        $item = Item::find($id);

        if($request->status == 0){
            $item->user_id = null;
            $item->notify = 0;
            $item->date = null;
            $item->status = 1;
            $item->update();
            Session::flash('success','تم التعديل بنجاح');
            return redirect()->back();
        }
        $value =ItemAttribute::where('item_id',$id)->first();
        $attributes = Attribute::where('family_id',$value->attribute_value->attribute->family_id)->get();
        $cats = Category::where('status',1)->orderBy('id','desc')->get();
        $cities = City::where('status',1)->orderBy('id','desc')->get();
        $options = Option::where('status',1)->orderBy('id','desc')->get();
        $owners = Owner::where('status',1)->orderBy('id','desc')->get();
        $images = ItemImage::where('item_id',$id)->where('status',1)->get();
        $users = User::where('status',1)->get();
        return view('admin.item.edit',compact('item','attributes','cats','cities','options','owners','users','images'));
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
            'name'  => 'required|max:191|unique:attributes,name',
            'description'  => 'required',
            'price'  => 'required',
            'main_image'  => 'nullable|main_image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'phone'  => 'required|digits:11|unique:owners,phone',
            'area'  => 'required',
            'district_id'  => 'nullable|exists:districts,id',
            'city_id'  => 'nullable|exists:cities,id',
            'category_id'  => 'required|exists:categories,id',
            'owner_id'  => 'required|exists:owners,id',
            'user_id'  => 'nullable|exists:users,id',
            'notify'  => 'nullable|boolean',
            'date'  => 'nullable|date',
        ],[
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'name.unique' => 'حقل الاسم موجود مسبقا',
            'description.required' => 'حقل الوصف  مطلوب',
            'price.required' => 'حقل السعر  مطلوب',
            'main_image.main_image' => 'حقل الصورة يجب أن يكون صورة',
            'main_image.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
            'main_image.max' => 'أقصى مساحة للصوره 2 ميجابايت',
            'phone.required' => 'حقل رقم الجوال مطلوب',
            'phone.digits' => 'حقل رقم الجوال يجب يكون 11 رقم',
            'phone.unique' => 'حقل رقم الجوال موجود مسبقا',
            'area.required' => 'حقل المنطقة مطلوب',

            'district_id.exists' => 'الاحياء غير موجودة',
            'city_id.exists' => 'المدينة غير موجودة',
            'category_id.required' => 'حقل القسم  مطلوب',
            'category_id.exists' => 'القسم غير موجودة',
            'owner_id.required' => 'حقل المالك مطلوب',
            'owner_id.exists' => 'المالك غير موجودة',
            'user_id.exists' => 'المستخدم غير موجودة',
        ]);

        $input = $request->all();

        if($item = Item::find($id)){
            
            if(!isset($input['city_id']) || $input['city_id'] == null){
                $input['city_id'] = $item->city_id;
            }

            if(!isset($input['district_id']) || $input['district_id'] == null){
                $input['district_id'] = $item->district_id;
            }

            if(isset($input['main_image'])){
                $path=$item['main_image'];
                $image = $input['main_image'];
                $destination = public_path('admin_assets/images/item');
                if(file_exists($destination.' / '.$path)){
                    unlink($destination.' / '.$path);
                }
                $name=time().'.'.$image->getClientOriginalName();
                $image->move($destination,$name);
                $input['main_image']=$name;
            }

            if(isset($input['images'])){
                for($i = 0; $i < count($input['images']); $i++){
    
                    if($input['images'][$i]){
                        $image = $input['images'][$i];
                        $destination = public_path('admin_assets/images/item');
                        $name = time().$item->id.$i.'images.'.$image->getClientOriginalExtension();
                        $image->move($destination,$name);
                        $input['images'][$i] = $name;
                    }
    
                    $images = [
                        'image' => $input['images'][$i],
                        'item_id' => $item->id
                    ];
                    ItemImage::create($images);
                }
            }

            $delete_values = ItemAttribute::where('item_id',$id)->get();
            foreach($delete_values as $delete_value){
                $delete_value->delete();
            }

            $delete_options = ItemOption::where('item_id',$id)->get();
            foreach($delete_options as $delete_option){
                $delete_option->delete();
            }

            for($v=0;$v<count($input['values']);$v++){
                $values = [
                    'attribute_value_id' => $input['values'][$v],
                    'item_id' => $item->id
                ];
                ItemAttribute::create($values);
            }
    
            for($o=0;$o<count($input['options']);$o++){
                $options = [
                    'option_id' => $input['options'][$o],
                    'item_id' => $item->id
                ];
                ItemOption::create($options);
            }

            if(isset($input['user_id']) && $input['user_id'] != null){
                $input['status'] = 0;
            }

            $item->update($input);
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
        $delete =  Item::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_image($id)
    {
        $delete =  ItemImage::find($id);

        if(isset($delete->image)){
            $path=$delete['image'];
            $destination = public_path('admin_assets/images/item');
            if(file_exists($destination.' / '.$path)){
                unlink($destination.' / '.$path);
            }
        }
        $delete->delete();
        return json_encode($delete);;
    }

}


