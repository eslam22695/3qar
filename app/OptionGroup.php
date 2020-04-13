<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
    protected $table = 'option_groups';
    protected $fillable = [
        'id', 'name', 'status','category_id'
    ];
}
