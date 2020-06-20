<?php

namespace App\Http\Controllers\admin;

use App\Attribute;
use App\AttributeFamily;
use App\Category;
use App\Favourite;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemClick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\City;
use App\District;
use MongoDB\Driver\Query;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:report-list');
//        $this->middleware('permission:report-create', ['only' => ['create','store']]);
//        $this->middleware('permission:report-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:report-delete', ['only' => ['destroy']]);
    }

    public function district()
    {
        $cities = City::all();

        return view('admin.reports.district',compact('cities'));
    }


    public function district_report(Request $request)
    {
        $this->validate(request(),
        [
            'city_id' => 'required|exists:cities,id',
        ],[
            'city_id.required' => 'حقل المدينة  مطلوب',
            'city_id.exists' => 'المدينة غير موجودة',
        ]);

        $input = $request->all();

        $districts = District::where('city_id',$input['city_id'])->get();

        $cities = City::all();

        return view('admin.reports.district',compact('cities','districts'));
    }


    public function attribute()
    {
        $families = AttributeFamily::all();

        return view('admin.reports.attribute',compact('families'));
    }


    public function attribute_report(Request $request)
    {
        $this->validate(request(),
            [
                'family_id'  => 'required|exists:attribute_families,id',

            ],[
                'family_id.required' => 'حقل عائلة الخصائص مطلوب',
                'family_id.exists' => 'عائلة الخصائص غير موجودة',

            ]);

        $input = $request->all();

        $attributes = Attribute::where('family_id',$input['family_id'])->get();

        $families = AttributeFamily::all();

        return view('admin.reports.attribute',compact('families','attributes'));
    }


    public function item()
    {
        $families = AttributeFamily::all();
        $cities = City::all();
        $cats = Category::all();

        return view('admin.reports.item',compact('families','cities','cats'));
    }

    public function item_report(Request $request)
    {
        $this->validate(request(),
        [
            'city_id' => 'nullable|exists:cities,id',
            'category_id' => 'nullable|exists:categories,id',
            'price_from' => 'nullable|numeric',
            'price_to' => 'nullable|numeric',
            'area_from' => 'nullable|numeric',
            'area_to' => 'nullable|numeric',
        ],[
            'city_id.exists' => 'المدينة غير موجودة',
            'category_id.exists' => 'القسم غير موجودة',
            'price_from.numeric' => 'حقل السعر من يجب أن يكون رقم',
            'price_to.numeric' => 'حقل السعر إلى يجب أن يكون رقم',
            'area_from.numeric' => 'حقل المساحه من يجب أن يكون رقم',
            'area_to.numeric' => 'حقل المساحه إلى يجب أن يكون رقم',
        ]);

        $input = $request->all();
        
        if ($request->hasAny(['city_id', 'category_id','price_from', 'price_to','area_from', 'area_to'])) {

            $items = Item::query();
            

            $price_from = 0;
            $price_to = 0;
            $area_from = 0;
            $area_to = 0;

            if (isset($input['city_id']) && $input['city_id'] != null) {
                $city_id = $input['city_id'];
                $items->where('city_id', $input['city_id']);
            }

            if (isset($input['category_id']) && $input['category_id'] != null) {
                $category_id = $input['category_id'];
                $items->where('category_id', $input['category_id']);
            }

            if (isset($input['price_from']) && $input['price_from'] != null) {
                $price_from = (int)$input['price_from'];
                $items->where('price', '>=', $price_from);
            }

            if (isset($input['price_to']) && $input['price_to'] != null) {
                $price_to = (int)$input['price_to'];
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


            $items = $items->get();

            $families = AttributeFamily::all();
            $cities = City::all();
            $cats = Category::all();


            return view('admin.reports.item',compact('items','cities','cats','families','price_from','price_to','area_from','area_to'));
        }else{
            Session::flash('danger','يرجى إختيار احدى الاختيارات!!');
            return redirect()->back();
        }
    }

    public function item_click()
    {
        $items = Item::join("item_clicks", "item_clicks.item_id", "=", "items.id")
                ->select("items.id")
                ->groupBy("items.id")
                ->orderBy('items.id', 'asc')
                ->get();

        return view('admin.reports.item_click', compact('items'));

    }

    public function item_favourite()
    {
        $items = Item::join("favourites", "favourites.item_id", "=", "items.id")
                ->select("items.id")
                ->groupBy("items.id")
                ->orderBy('items.id', 'asc')
                ->get();

        return view('admin.reports.item_favourite', compact('items'));

    }


}
