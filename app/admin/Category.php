<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
   // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','image','pid','is_active', 'pid ','is_populer','description'
    ];


}
