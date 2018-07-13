<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'image '
    ];
}
