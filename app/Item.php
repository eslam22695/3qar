<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'id', 'name','description','price' ,'main_image','map','lat' , 'lang','phone','featured',
        'status', 'district_id', 'dimension_id','city_id','category_id' ,'owner_id', 'area'
    ];

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function dimension()
    {
        return $this->belongsTo('App\Dimension', 'dimension_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Owner', 'owner_id', 'id');
    }

    public function attribute_families()
    {
        return $this->belongsTo('App\AttributeFamily', 'attribute_families_id', 'id');
    }


    public function district()
    {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }

    public function selected_value($item_id,$value_id){
        $count = \App\ItemAttribute::where('item_id',$item_id)->where('attribute_value_id',$value_id)->count();
        return $count;
    }

    public function selected_option($item_id,$option_id){
        $count = \App\ItemOption::where('item_id',$item_id)->where('option_id',$option_id)->count();
        return $count;
    }

    public function value()
    {
        return $this->hasMany('App\ItemAttribute', 'item_id', 'id');
    }

    public function option()
    {
        return $this->hasMany('App\ItemOption', 'item_id', 'id');
    }

    public function favourite($id){

        $favourite = \App\Favourite::where('item_id',$id)->where('user_id',\Auth::user()->id)->count();

        return $favourite;
    }

}
