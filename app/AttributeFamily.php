<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeFamily extends Model
{
    protected $table = 'attribute_families';
    protected $fillable = [
        'id', 'name', 'status','category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

}
