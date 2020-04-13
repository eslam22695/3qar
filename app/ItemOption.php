<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOption extends Model
{
    protected $table = 'item_options';
    protected $fillable = [
        'id', 'status','item_id','option_id'
    ];
}
