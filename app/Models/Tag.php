<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $table = 'tags';
    protected $guarded = [];

    protected $with = ['translations'];
    protected $translatedAttributes = ['slug', 'name'];
    protected $hidden = ['translations'];
}
