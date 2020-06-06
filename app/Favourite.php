<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $fillable = [
        'id', 'status','item_id','user_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
