<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $table = 'brands';
    protected $fillable = ['photo', 'is_active'];

    protected $translatedAttributes = ['name'];
    protected $casts = ['is_active'=>'boolean'];

    protected $hidden = ['translations'];

}
