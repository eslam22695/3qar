<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'id','logo', 'about_home', 'main_about','about_image', 'footer','contact_text', 'phone1','phone2', 'address','email','map', 'facebook','twitter', 'linkedin','instagram', 'youtube','android', 'apple',
    ];
}
