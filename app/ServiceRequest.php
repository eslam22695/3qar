<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $table = 'service_requests';
    protected $fillable = [
        'id', 'name', 'email','phone','message','status','service_id'
    ];


    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
