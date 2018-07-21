<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','is_active', 'is_populer ','cover_image','description'
    ];


}
