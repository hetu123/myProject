<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','category_id'
    ];



 /*   public function product()
    {
        return $this->belongsTo('App\admin\Product');
    }


    public function category()
    {
        return $this->belongsTo('App\admin\Category');
    }*/
   /* public function product()
    {
        return $this->belongsToMany('App\admin\Category', 'category');
    }


    public function category()
    {
        return $this->belongsToMany('App\admin\Product', 'product');
    }*/

}
