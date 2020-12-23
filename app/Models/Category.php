<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Category extends Model
{
    use Translatable;

    protected $table = 'categories';
    protected $fillable = ['parent_id', 'slug', 'is_active'];

    protected $with = ['translations'];
    protected $hidden = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $casts = ['is_active'=>'boolean'];
}
