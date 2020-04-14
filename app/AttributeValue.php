<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_value';
    protected $fillable = [
        'id', 'name', 'status','attribute_id'
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Attribute', 'attribute_id', 'id');
    }
}
