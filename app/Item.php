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
}
