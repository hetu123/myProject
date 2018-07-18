<?php

namespace App\API;

use Illuminate\Database\Eloquent\Model;

class DealsProduct extends Model
{
    protected $table = 'deals_product';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','deal_id'
    ];
}
