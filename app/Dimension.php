<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $table = 'dimensions';
    protected $fillable = [
        'id', 'name', 'status','city_id'
    ];
}
