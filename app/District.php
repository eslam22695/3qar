<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = [
        'id', 'name', 'status','dimension_id','city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function dimension()
    {
        return $this->belongsTo('App\Dimension', 'dimension_id', 'id');
    }

}
