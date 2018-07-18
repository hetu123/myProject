<?php

namespace App\API;

use Illuminate\Database\Eloquent\Model;

class UserFavourite extends Model
{
    protected $table = 'user_favourite';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','product_id'
    ];
}
