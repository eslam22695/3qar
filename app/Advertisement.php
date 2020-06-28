<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = [
        'id', 'title','image', 'description','content','status'
    ];
}
