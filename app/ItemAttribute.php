<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    protected $table = 'item_attributes';
    protected $fillable = [
        'id', 'status','item_id','attribute_value_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }

    public function attribute_value()
    {
        return $this->belongsTo('App\AttributeValue', 'attribute_value_id', 'id');
    }
}
