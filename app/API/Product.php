<?php

namespace App\API;

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
        'title','is_active', 'is_populer ','cover_image','description'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\API\Category');
    }
    public function images(){

        return $this->hasMany('App\API\Image');
    }
    public function deals()
    {
        return $this->belongsToMany('App\API\Deals');
    }
}
