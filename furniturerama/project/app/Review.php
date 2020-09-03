<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'furniture_id', 'rating', 'title', 'comment'
    ];
    //one review to one furniture
    public function furniture()
    {
        return $this->belongsTo(Furniture::class);
    }
    //one review to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
