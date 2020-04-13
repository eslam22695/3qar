<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = [
        'id', 'name', 'status','icon','family_id'
    ];
}
