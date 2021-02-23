<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = [
        'categories_id', 'name', 'description', 'image',
    ];
}
