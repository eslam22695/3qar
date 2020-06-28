<?php

namespace App\Http\Controllers;


use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Attribute;
use App\Blog;
use App\Contact;
use App\Feature;
use App\Item;
use App\ItemClick;
use App\Favourite;
use App\ItemImage;
use App\Service;
use App\ServiceRequest;
use App\Setting;
use App\User;
use App\District;
use Auth;

class IndexController extends Controller
{
    
    public function index()
    {
        $setting = Setting::first();
        $items = Item::where('featured', 1)->where('status', 1)->take(6)->get();
        return view('front.index',compact('setting','items'));
    }

    public function about()
    {
        $setting = Setting::first();
        $features = Feature::take(3)->get();

        return view('front.about',compact('setting','features'));
    }

    public function blog()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(9);

        return view('front.blog',compact('blogs'));

    }

    public function blog_details($id,$title)
    {
        $blog = Blog::find($id);

        $blogs = Blog::where('id','!=',$id)->where('status',1)->inRandomOrder()->take(4)->get();

        return view('front.blog_details',compact('blog','blogs'));
    }

    public function consultation()
    {
        $services = Service::all();
        return view('front.consultation',compact('services'));
    }

    public function consultation_post(Request $request)
    {
        $this->validate($request,[

            'service_id'  => 'required|exists:services,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();

        ServiceRequest::create($input);

        Session::flash('success','تم إرسالة الرسالة بنجاح سيتم التواصل في أقرب وقت ');
        return redirect()->back();
    }

    public function contact()
    {
        $setting = Setting::first();

        return view('front.contact',compact('setting'));
    }

    public function contact_post(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        Session::flash('success','تم إرسالة الرسالة بنجاح سيتم التواصل في أقرب وقت ');
        return redirect()->back();
    }

    public function items(Request $request)
    {
        $this->validate($request,[
            'cat_id' => 'required|exists:categories,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        $input = $request->all();

        $districts = District::where('city_id',$input['city_id'])->where('status',1)->get();

        $items = Item::where('category_id',$input['cat_id'])->where('city_id',$input['city_id'])->where('status',1);

        $price_from = 0;
        $price_to = 0;
        $area_from = 0;
        $area_to = 0;
        $district_id = 0;

        if (isset($input['district_id']) && $input['district_id'] != null && $input['district_id'] != 0) {
            $district_id = $input['district_id'];
            $items->where('district_id', $input['district_id']);
        }
        
        if (isset($input['price_from']) && $input['price_from'] != null) {
            $price_from = $input['price_from'];
            $items->where('price', '>=', $input['price_from']);
        }
        
        if (isset($input['price_to']) && $input['price_to'] != null) {
            $price_to = $input['price_to'];
            $items->where('price', '<=', $price_to);
        }
        
        if (isset($input['area_from']) && $input['area_from'] != null) {
            $area_from = $input['area_from'];
            $items->where('area', '>=', $input['area_from']);
        }
        
        if (isset($input['area_to']) && $input['area_to'] != null) {
            $area_to = $input['area_to'];
            $items->where('area', '<=', $input['area_to']);
        }
        
        $items = $items->orderBy('id','desc')->paginate(9);

        $cat_id = $input['cat_id'];
        $city_id = $input['city_id'];

        return view('front.filter',compact('items','city_id','cat_id','price_from','price_to','area_from','area_to','districts','district_id'));
    }

    public function item_details($id,$title)
    {
        $count = 0;
        if(Auth::user()){
            $count = ItemClick::where('item_id',$id)->where('user_id',Auth::user()->id)->count();
        }
        $item = Item::find($id);
        $images = ItemImage::where('item_id',$id)->get();

        $others = Item::where('category_id',$item->category_id)->where('id', '!=' , $id)->where('status',1)->inRandomOrder()->take(3)->get();

        return view('front.filter_details',compact('item','images','count','others'));

    }

    public function profile()
    {
        $user = Auth::user();

        $favs = Favourite::where('user_id',$user->id)->get();
        $favCount = Favourite::where('user_id',$user->id)->count();

        $clicks = ItemClick::where('user_id',$user->id)->get();
        $clickCount = ItemClick::where('user_id',$user->id)->count();

        return view('front.profile',compact('user','favs','favCount','clicks','clickCount'));
    }

    public function edit_profile(Request $request){

        $user = Auth::user();

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|numeric',
            'password' => 'nullable|min:6',
        ]);

        $input = $request->all();

        if(isset($input['password']) && $input['password'] != null){
            $input['password'] = bcrypt($input['password']);
        }else{
            $input['password'] = $user->password;
        }

        $user->update($input);

        Session::flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function special()
    {
        $specials = Item::where('featured',1)->where('status',1)->paginate(9);
        return view('front.special',compact('specials'));
    }

    public function ajax_phone(Request $request){
        $input = $request->all();
        $id = $input['item_id'];
        if(Auth::user()){
            $input['user_id'] = Auth::user()->id;
            ItemClick::create($input);
            $item = Item::find($id);
            return $item->phone;
        }else{
            return 0;
        }
        
    }

    public function ajax_fav(Request $request){
        $input = $request->all();
        if(Auth::user()){
            $input['user_id'] = Auth::user()->id;
            Favourite::create($input);
            return 1;
        }else{
            return 0;
        }
    }

    public function ajax_unfav(Request $request){
        $input = $request->all();
        if(Auth::user()){
            $input['user_id'] = Auth::user()->id;
            Favourite::where('item_id',$input['item_id'])->where('user_id',$input['user_id'])->delete();
            return 1;
        }else{
            return 0;
        }
    }
    
    /**
     * District Ajax
     */
    public function ajax_district(Request $request)
    {
        $districts = DB::table('districts')->where('city_id',$request->city_id)->pluck("name","id")->all();
        return response()->json($districts);
    }


    public function advertisement_details()
    {
        $advertisement = Advertisement::all();
        dd($advertisement);



        return view('front.advertisement_details',compact('advertisement'));
    }

}
