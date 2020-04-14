<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';
    protected $fillable = [
        'id', 'name', 'status','option_group_id'
    ];

    public function option_group()
    {
        return $this->belongsTo('App\OptionGroup', 'option_group_id', 'id');
    }
}
