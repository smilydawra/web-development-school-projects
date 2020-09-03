<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Furniture;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id','shippingStreet','shippingProvince','shippingCity','shippingPost','shippingCost','shippingStatus','subtotal','GST','HST','PST','finalPrice','transactionStatus'
    ];

    public function furnitures()
    {
        return $this->belongsToMany(Furniture::class)->withPivot('quantity', 'itemPrice');
    }
    //one order belongs to one user
    //
    //
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //one order can have many transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    //because of many to many relationships we use belongs to many so Laravel will use intersect table
}
