<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{   
    use SoftDeletes;
    //one transaction belong to one order

    protected $fillable = [
        'transactionStatus', 
        'transactionCode',
        'order_id'
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
