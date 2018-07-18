<?php

namespace App\API;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    protected $table = 'deals';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','short_description','is_active', 'favorite_cnt ','is_populer'
    ];

    public function products()
    {
        return $this->belongsToMany('App\API\Product');
    }
}
