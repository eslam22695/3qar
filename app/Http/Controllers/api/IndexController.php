<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

use App\Item;
use App\Category;
use App\City;
use App\Setting;
use App\Contact;
use App\Service;
use App\ServiceRequest;
use App\Blog;
use App\Feature;
use App\ItemAttribute;
use App\ItemImage;
use App\ItemOption;
use App\District;
use App\Favourite;

class IndexController extends Controller
{
    private $asset = '/admin_assets/images/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    { 
        $data = [];
        
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lang' => 'required',
        ]);

        $lat = $request['lat'];
        $lang = $request['lang'];
        $cat_id = $request['cat_id'];
        
        if($cat_id == 0){
            $item = Item::select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lang ) - radians('.$lang.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance'))->having('distance', '<', 25)->where('status',1)->orderBy('distance')->get();
        }else{
            $item = Item::select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lang ) - radians('.$lang.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance'))->having('distance', '<', 25)->where('category_id',$cat_id)->where('status',1)->orderBy('distance')->get();
        }
        

        if(isset($item) && count($item)>0){
            for($i=0; $i<count($item); $i++){
                $data['item'][$i]['id'] = $item[$i]->id;
                $data['item'][$i]['name'] = $item[$i]->name;
                $data['item'][$i]['description'] = $item[$i]->description;
                $data['item'][$i]['price'] = $item[$i]->price;
                $data['item'][$i]['main_image'] = url($this->asset.'item/'.$item[$i]->main_image);
                $data['item'][$i]['category'] = $item[$i]->category->name;
                $data['item'][$i]['district'] = $item[$i]->district->name;
                $data['item'][$i]['city'] = $item[$i]->city->name;
                $data['item'][$i]['area'] = $item[$i]->area;
                $data['item'][$i]['phone'] = $item[$i]->phone;
                $data['item'][$i]['lat'] = $item[$i]->lat;
                $data['item'][$i]['lang'] = $item[$i]->lang;
            }
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function category($id){
        $data = [];
        if($id == 0){
            $item = Item::where('status',1)->orderBy('id')->get();
        }else{
            $item = Item::where('category_id',$id)->where('status',1)->orderBy('id')->get();
        }

        if(isset($item) && $item != null){
            for($i=0; $i<count($item); $i++){
                $data['item'][$i]['id'] = $item[$i]->id;
                $data['item'][$i]['name'] = $item[$i]->name;
                $data['item'][$i]['description'] = $item[$i]->description;
                $data['item'][$i]['price'] = $item[$i]->price;
                $data['item'][$i]['main_image'] = url($this->asset.'item/'.$item[$i]->main_image);
                $data['item'][$i]['category'] = $item[$i]->category->name;
                $data['item'][$i]['district'] = $item[$i]->district->name;
                $data['item'][$i]['city'] = $item[$i]->city->name;
                $data['item'][$i]['area'] = $item[$i]->area;
                $data['item'][$i]['phone'] = $item[$i]->phone;

                $attribute = ItemAttribute::where('item_id',$item[$i]->id)->get();

                for($j=0; $j<count($attribute); $j++){
                    $data['item'][$i]['attribute'][$j]['name'] = $attribute[$j]->attribute_value->attribute->name;
                    $data['item'][$i]['attribute'][$j]['icon'] = url($this->asset.'attribute/'.$attribute[$j]->attribute_value->attribute->icon);
                    $data['item'][$i]['attribute'][$j]['value'] = $attribute[$j]->attribute_value->value;

                }

            }
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function items(){
        $data = [];
        $item = Item::where('status',1)->orderBy('id')->get();
        
        if(isset($item) && $item != null){
            for($i=0; $i<count($item); $i++){
                $data['item'][$i]['id'] = $item[$i]->id;
                $data['item'][$i]['name'] = $item[$i]->name;
                $data['item'][$i]['description'] = $item[$i]->description;
                $data['item'][$i]['price'] = $item[$i]->price;
                $data['item'][$i]['main_image'] = url($this->asset.'item/'.$item[$i]->main_image);
                $data['item'][$i]['category'] = $item[$i]->category->name;
                $data['item'][$i]['district'] = $item[$i]->district->name;
                $data['item'][$i]['city'] = $item[$i]->city->name;
                $data['item'][$i]['area'] = $item[$i]->area;
                $data['item'][$i]['phone'] = $item[$i]->phone;

                $attribute = ItemAttribute::where('item_id',$item[$i]->id)->get();

                for($j=0; $j<count($attribute); $j++){
                    $data['item'][$i]['attribute'][$j]['name'] = $attribute[$j]->attribute_value->attribute->name;
                    $data['item'][$i]['attribute'][$j]['icon'] = url($this->asset.'attribute/'.$attribute[$j]->attribute_value->attribute->icon);
                    $data['item'][$i]['attribute'][$j]['value'] = $attribute[$j]->attribute_value->value;

                }

            }
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function categories(){

        $cats = Category::where('status',1)->get();
        if(isset($cats) && $cats != null){
            $data['cats'] = $cats;
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function cities(){

        $city = City::where('status',1)->get();
        if(isset($city) && $city != null){
            $data['city'] = $city;
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function district($id){
        $district = District::where('city_id',$id)->where('status',1)->get();
        if(isset($district) && $district != null){
            $data['district'] = $district;
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function item($id){
        $data = [];
        $item = Item::find($id);
        $data['id'] = $item->id;
        $data['name'] = $item->name;
        $data['description'] = $item->description;
        $data['price'] = $item->price;
        $data['main_image'] = url($this->asset.'item/'.$item->main_image);
        $data['category'] = $item->category->name;
        $data['district'] = $item->district->name;
        $data['city'] = $item->city->name;
        $data['area'] = $item->area;
        $data['phone'] = $item->phone;
        $data['lat'] = $item->lat;
        $data['lang'] = $item->lang;

        $images = ItemImage::where('item_id',$item->id)->get();
        for($i=0; $i<count($images); $i++){
            $data['image'][$i] = url($this->asset.'item/'.$images[$i]->image);
        }

        $options = ItemOption::where('item_id',$item->id)->get();
        for($o=0; $o<count($options); $o++){
            $data['option'][$o] = $options[$o]->option->name;
        }

        $attribute = ItemAttribute::where('item_id',$item->id)->get();
        for($a=0; $a<count($attribute); $a++){
            $data['attribute'][$a]['name'] = $attribute[$a]->attribute_value->attribute->name;
            $data['attribute'][$a]['icon'] = url($this->asset.'attribute/'.$attribute[$a]->attribute_value->attribute->icon);
            $data['attribute'][$a]['value'] = $attribute[$a]->attribute_value->value;
        }

        $more = Item::where('category_id',$item->category_id)->where('id', '!=' , $id)->where('status',1)->inRandomOrder()->take(3)->get();
        for($m=0; $m<count($more); $m++){
            $data['more'][$i]['id'] = $more[$i]->id;
            $data['more'][$i]['name'] = $more[$i]->name;
            $data['more'][$i]['description'] = $more[$i]->description;
            $data['more'][$i]['price'] = $more[$i]->price;
            $data['more'][$i]['main_image'] = url($this->asset.'item/'.$more[$i]->main_image);
            $data['more'][$i]['category'] = $more[$i]->category->name;
            $data['more'][$i]['district'] = $more[$i]->district->name;
            $data['more'][$i]['city'] = $more[$i]->city->name;
            $data['more'][$i]['area'] = $more[$i]->area;
            $data['more'][$i]['phone'] = $more[$i]->phone;

            $attribute = ItemAttribute::where('item_id',$more[$i]->id)->get();

            for($j=0; $j<count($attribute); $j++){
                $data['more'][$i]['attribute'][$j]['name'] = $attribute[$j]->attribute_value->attribute->name;
                $data['more'][$i]['attribute'][$j]['icon'] = url($this->asset.'attribute/'.$attribute[$j]->attribute_value->attribute->icon);
                $data['more'][$i]['attribute'][$j]['value'] = $attribute[$j]->attribute_value->value;

            }

        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function featured(){
        $item = Item::where('featured',1)->where('status',1)->orderBy('id')->get();
        $data = [];

        if(isset($item) && $item != null){
            for($i=0; $i<count($item); $i++){
                $data['item'][$i]['id'] = $item[$i]->id;
                $data['item'][$i]['name'] = $item[$i]->name;
                $data['item'][$i]['description'] = $item[$i]->description;
                $data['item'][$i]['price'] = $item[$i]->price;
                $data['item'][$i]['main_image'] = url($this->asset.'item/'.$item[$i]->main_image);
                $data['item'][$i]['category'] = $item[$i]->category->name;
                $data['item'][$i]['district'] = $item[$i]->district->name;
                $data['item'][$i]['city'] = $item[$i]->city->name;
                $data['item'][$i]['area'] = $item[$i]->area;
                $data['item'][$i]['phone'] = $item[$i]->phone;

                $attribute = ItemAttribute::where('item_id',$item[$i]->id)->get();

                for($j=0; $j<count($attribute); $j++){
                    $data['item'][$i]['attribute'][$j]['name'] = $attribute[$j]->attribute_value->attribute->name;
                    $data['item'][$i]['attribute'][$j]['icon'] = url($this->asset.'attribute/'.$attribute[$j]->attribute_value->attribute->icon);
                    $data['item'][$i]['attribute'][$j]['value'] = $attribute[$j]->attribute_value->value;

                }

            }
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    public function filter(Request $request){
        $input = $request->all();

        $item = Item::query();

        if (isset($input['cat_id']) && $input['cat_id'] != null) {
            $item->where('category_id', $input['cat_id']);
        }
        
        if (isset($input['city_id']) && $input['city_id'] != null) {
            $item->where('city_id', $input['city_id']);
        }
        
        if (isset($input['from']) && $input['from'] != null) {
            $item->where('price', '>=', $input['from']);
        }
        
        if (isset($input['to']) && $input['to'] != null) {
            $item->where('price', '<=', $input['to']);
        }
        
        if (isset($input['area']) && $input['area'] != null) {
            $item->where('area', $input['area']);
        }

        $item = $item->where('status',1)->get();

        if(isset($item) && $item != null){
            for($i=0; $i<count($item); $i++){
                $data['item'][$i]['id'] = $item[$i]->id;
                $data['item'][$i]['name'] = $item[$i]->name;
                $data['item'][$i]['description'] = $item[$i]->description;
                $data['item'][$i]['price'] = $item[$i]->price;
                $data['item'][$i]['main_image'] = url($this->asset.'item/'.$item[$i]->main_image);
                $data['item'][$i]['category'] = $item[$i]->category->name;
                $data['item'][$i]['district'] = $item[$i]->district->name;
                $data['item'][$i]['city'] = $item[$i]->city->name;
                $data['item'][$i]['area'] = $item[$i]->area;
                $data['item'][$i]['phone'] = $item[$i]->phone;

                $attribute = ItemAttribute::where('item_id',$item[$i]->id)->get();

                for($j=0; $j<count($attribute); $j++){
                    $data['item'][$i]['attribute'][$j]['name'] = $attribute[$j]->attribute_value->attribute->name;
                    $data['item'][$i]['attribute'][$j]['icon'] = url($this->asset.'attribute/'.$attribute[$j]->attribute_value->attribute->icon);
                    $data['item'][$i]['attribute'][$j]['value'] = $attribute[$j]->attribute_value->value;

                }

            }
        }else{
            $data = [];
        }

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    { 
        $data = [];
        $setting = Setting::first();
        $feature = Feature::take(3)->get();

        if(isset($setting) && $setting != null){
            $data['setting']['about_text'] = $setting->main_about;
            $data['setting']['about_image'] = url($this->asset.'setting/'.$setting->about_image);
        }else{
            $data['setting'] = [];
        }

        if(isset($feature) && count($feature)>0){
            for($i=0; $i<count($feature); $i++){
                $data['feature'][$i]['id'] = $feature[$i]->id;
                $data['feature'][$i]['title'] = $feature[$i]->title;
                $data['feature'][$i]['description'] = $feature[$i]->description;
                $data['feature'][$i]['icon'] = url($this->asset.'feature/'.$feature[$i]->icon);
            }
        }else{
            $data['feature'] = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $setting = Setting::first();
        if(isset($setting) && $setting != null){
            $data['phone1'] = $setting->phone1;
            $data['phone2'] = $setting->phone2;
            $data['address'] = $setting->address;
            $data['email'] = $setting->email;
            $data['map'] = $setting->map;
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contact_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'يرجى إضافة الاسم',
            'email.required' => 'يرجى إضافة البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكترونى صحيح',
            'phone.required' => 'يرجى إضافة رقم الجوال',
            'message.required' => 'يرجى إضافة الرسالة',            
        ]);

        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 401);
        }

        $input = $request->all();
        Contact::create($input);

        return response([
            'status'    =>      'success',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        $services = Service::where('status',1)->get();
        if(isset($services) && count($services)>0){
            $data['services'] = $services;
        }else{
            $data = [];
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function service_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'service_id'  => 'required|exists:services,id',
        ],[
            'name.required' => 'يرجى إضافة الاسم',
            'email.required' => 'يرجى إضافة البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكترونى صحيح',
            'phone.required' => 'يرجى إضافة رقم الجوال',
            'message.required' => 'يرجى إضافة الرسالة',            
            'service_id.required' => 'يرجى إختيار خدمة',            
            'service_id.exists' => 'الخدمة غير موجودة',            
        ]);

        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 401);
        }

        $input = $request->all();
        ServiceRequest::create($input);

        return response([
            'status'    =>      'success',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
        $data = [];
        if(isset($blogs) && count($blogs)>0){
            for($i=0; $i<count($blogs); $i++){
                $data['blogs'][$i]['id'] = $blogs[$i]->id;
                $data['blogs'][$i]['title'] = $blogs[$i]->title;
                $data['blogs'][$i]['description'] = $blogs[$i]->description;
                $data['blogs'][$i]['image'] = url($this->asset.'blog/'.$blogs[$i]->image);
                $data['blogs'][$i]['created_at'] = $blogs[$i]->created_at;
            }
        }
        
        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blog_details($id)
    {
        $blog = Blog::find($id);
        $data = [];
        $data['id'] = $blog->id;
        $data['title'] = $blog->title;
        $data['description'] = $blog->description;
        $data['content'] = $blog->content;
        $data['image'] = url($this->asset.'blog/'.$blog->image);
        $data['created_at'] = $blog->created_at;

        return response([
            'status'    =>      'success',
            'data'      =>      $data
        ], 200);
    }

    /*AUTH*/

    public function fav(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response([
                'status'    =>      'error',
                'errors'     =>      $validator->errors(),
                'data'      =>      null
            ], 401);
        }

        $user = Auth::user();
        
        $input = $request->all();

        if($input['status'] == 0){
            $unfav = Favourite::where('item_id',$id)->where('user_id',$user->id)->first();
            if($unfav != null){
                $unfav->delete();
            }
            return response([
                'status'    =>      'success',
                'data'      =>      'تم حذف من المفضلة'
            ], 200);
        }elseif($input['status'] == 1){
            $input['user_id'] = $user->id;
            $input['item_id'] = $id;
            Favourite::create($input);
            return response([
                'status'    =>      'success',
                'data'      =>      'تم الإضافة إلى المفضلة'
            ], 200);
        }else{
            return response([
                'status'    =>      'error',
                'data'      =>      null
            ], 401);
        }
    }
}
