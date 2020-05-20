<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Blog;
use App\Contact;
use App\Feature;
use App\Http\Controllers\Controller;
use App\Item;
use App\Service;
use App\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Setting;

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
        $blogs = Blog::All();

        return view('front.blog',compact('blogs'));

    }


    public function blog_details($id)
    {
        $blog = Blog::find($id);

        $blogs = Blog::where('id','!=',$id)->where('status','1')->orderBy('id','desc')->take(4)->get();

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


    public function filter()
    {
        return view('front.filter');

    }

    public function filter_details()
    {
        return view('front.filter_details');

    }

    public function profile()
    {
        return view('front.profile');

    }

    public function special()
    {
        return view('front.special');

    }

}
