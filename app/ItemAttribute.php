<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    protected $table = 'item_attributes';
    protected $fillable = [
        'id', 'status','item_id','attribute_value_id'
    ];
}
