<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemClick extends Model
{
    protected $table = 'item_click';
    protected $fillable = [
        'id', 'status','item_id','user_id'
    ];
}
