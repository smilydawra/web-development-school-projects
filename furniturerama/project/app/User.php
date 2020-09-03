<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userFirstName', 'userLastName', 'birthDate', 'phone', 'street', 'post', 'city', 'province', 'email', 'password', 'admin', 'image', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //one user can leave many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    //one user may have many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
