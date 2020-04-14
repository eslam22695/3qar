<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'id', 'name','description','price' ,'main_image','map','lat' , 'lang','phone','featured',
        'status', 'district_id', 'dimension_id','city_id','category_id' ,'owner_id'
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

    public function district()
    {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }

}
