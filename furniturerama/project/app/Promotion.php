<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'promotionCode', 'promotionAmount'
    ];

	public function discount($total){
		if($this->promotionCode){
			$discount = ($this->promotionAmount / 100 ) * $total;
			return $discount;
		} else {
			return 0;
		}
	}

}
