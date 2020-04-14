<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    protected $table = 'item_images';
    protected $fillable = [
        'id','status', 'image','item_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }
}
