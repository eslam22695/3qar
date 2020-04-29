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

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('status',1)->orderBy('id','desc')->get();
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
            'name'  => 'required',
            'description'  => 'required',
            'price'  => 'required',
            'main_image'  => 'required',
            'phone'  => 'required',
            'area'  => 'required',
            'district_id'  => 'required|exists:districts,id',
            'city_id'  => 'required|exists:cities,id',
            'category_id'  => 'required|exists:categories,id',
            'owner_id'  => 'required|exists:owners,id',
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
        $item = Item::find($id);
        $value =ItemAttribute::where('item_id',$id)->first();
        $attribute = Attribute::where('family_id',$value->attribute_value->attribute->family_id)->get();
        $cats = Category::where('status',1)->orderBy('id','desc')->get();
        $cities = City::where('status',1)->orderBy('id','desc')->get();
        $options = Option::where('status',1)->orderBy('id','desc')->get();
        $owners = Owner::where('status',1)->orderBy('id','desc')->get();
        return view('admin.item.edit',compact('item','attribute','cats','cities','options','owners'));
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
                'name'  => 'required',
                'description'  => 'required',
                'price'  => 'required',
                'main_image'  => 'required',
                'phone'  => 'required',
                'area'  => 'required',
                'district_id'  => 'required|exists:districts,id',
                'city_id'  => 'required|exists:cities,id',
                'category_id'  => 'required|exists:categories,id',
                'owner_id'  => 'required|exists:owners,id',
            ]);

        $input = $request->all();
        if($item = Item::find($id)){


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
                        $path=$item['images'];
                        $image = $input['images'][$i];
                        $destination = public_path('admin_assets/images/item');
                        if(file_exists($destination.' / '.$path)){
                            unlink($destination.' / '.$path);
                        }
                        $name = time().$item->id.$i.'images.'.$image->getClientOriginalName();
                        $image->move($destination,$name);
                        $input['images'][$i] = $name;
                    }
//                    $images = [
//                        'image' => $input['images'][$i],
//                        'item_id' => $item->id
//                    ];
//                    ItemImage::create($images);
                }
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

}


