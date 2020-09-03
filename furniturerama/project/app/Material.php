<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'materialName'
    ];
    public function furnitures()
    {
        //from one material(leather) can have many furniture
        return $this->hasMany(Furniture::class);
    }
}
