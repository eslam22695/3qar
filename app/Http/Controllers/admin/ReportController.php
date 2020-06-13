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
        ],[
            'city_id.exists' => 'المدينة غير موجودة',
            'category_id.exists' => 'القسم غير موجودة',
        ]);

        dd($input = $request->all());

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
        $items = DB::table('item_clicks')
                    ->select('id','item_id','user_id')
                    ->groupBy('item_id')
                    ->orderBy('item_id', 'DESC')
                    ->pluck('id','item_id','user_id')->toArray();

        return view('admin.reports.item_click', compact('items'));

    }

    public function item_favourite()
    {
        $favourites = Favourite::groupBy('item_id')->orderBy('item_id', 'desc')->get();

        return view('admin.reports.item_favourite', compact('favourites'));

    }


}
