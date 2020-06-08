<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Blog;
use App\Contact;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemClick;
use App\Favourite;
use App\ItemImage;
use App\Service;
use App\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Setting;
use Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        $items = Item::where('featured', 1)->where('status', 1)->get();
        $attribute = Attribute::all();
        return view('front.index',compact('setting','items','attribute'));
    }

    public function about()
    {
        $setting = Setting::first();
        $features = Feature::All();

        return view('front.about',compact('setting','features'));
    }


    public function blog()
    {
        $blogs = Blog::all();

        return view('front.blog',compact('blogs'));

    }


    public function blog_details($id)
    {
        $blog = Blog::find($id);

        $blogs = Blog::where('id','!=',$id)->where('status',1)->orderBy('id','desc')->take(4)->get();

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
            'email' => 'required',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();

        ServiceRequest::create($input);

        Session::flash('success','تم الاضافه بنجاح');
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
            'email' => 'required',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        Session::flash('success','تم الاضافه بنجاح');
        return redirect()->back();
    }


    public function items(Request $request)
    {
        $this->validate($request,[
            'cat_id' => 'required|exists:categories,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        $input = $request->all();

        $items = Item::where('category_id',$input['cat_id'])->where('city_id',$input['city_id'])->where('status',1);

        $from = 0;
        $to = 0;
        $area = 0;

        if (isset($input['from']) && $input['from'] != null) {
            $from = $input['from'];
            $items->where('price', '>=', $input['from']);
        }
        
        if (isset($input['to']) && $input['to'] != null) {
            $to = $input['to'];
            $items->where('price', '<=', $input['to']);
        }
        
        if (isset($input['area']) && $input['area'] != null) {
            $area = $input['area'];
            $items->where('area', $input['area']);
        }
        
        $items = $items->get();

        $cat_id = $input['cat_id'];
        $city_id = $input['city_id'];

        return view('front.filter',compact('items','city_id','cat_id','from','to','area'));
    }

    public function item_details($id)
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

    public function special()
    {
        $specials = Item::where('featured',1)->where('status',1)->paginate(6);
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

}
