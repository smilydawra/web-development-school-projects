<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{   
    use SoftDeletes;
    //category has many categories
    //
    protected $fillable = [
        'categoryName'
    ];
    public function furnitures()
    {
        return $this->hasMany(Furniture::class);
    }
}
