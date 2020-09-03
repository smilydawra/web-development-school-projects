<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Furniture extends Model
{
     use SoftDeletes;
    //one furniture can belong to one category(ex. Name reclainer is a furniture and belongs to one category sofa)
    //
    protected $fillable = [
        'category_id','manufacturer_id','material_id','name','price','depth','height','width','cost','description','color','image','SKU','in_stock',
    ];


    public function category()
    {   
        return $this->belongsTo(Category::class);
    }
    //one furniture to one manufacturer
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    //one furniture to one material
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    //single furniture has many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    //because of many to many relationships we use belongs to many so Laravel will use intersect table
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
