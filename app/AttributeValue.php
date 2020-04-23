<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_values';
    protected $fillable = [
        'id', 'value', 'status','attribute_id'
    ];

    public function attribute()
    {
        return $this->belongsTo('App\Attribute', 'attribute_id', 'id');
    }
}
