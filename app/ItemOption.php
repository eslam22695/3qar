<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOption extends Model
{
    protected $table = 'item_options';
    protected $fillable = [
        'id', 'status','item_id','option_id'
    ];



    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }

    public function option()
    {
        return $this->belongsTo('App\Option', 'option_id', 'id');
    }

}
