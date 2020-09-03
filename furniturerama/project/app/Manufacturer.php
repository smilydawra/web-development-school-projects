<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'manufacturerName'
    ];
    //one manufacturer can have many furniture
    public function furnitures()
    {
        return $this->hasMany(Furniture::class);

    }
}
