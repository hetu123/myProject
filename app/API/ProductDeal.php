<?php

namespace App\API;

use Illuminate\Database\Eloquent\Model;

class ProductDeal extends Model
{
    protected $table = 'product_deal';
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
