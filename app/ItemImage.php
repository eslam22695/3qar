<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    protected $table = 'item_images';
    protected $fillable = [
        'id','status', 'image','item_id'
    ];
}
