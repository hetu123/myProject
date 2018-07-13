<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','first_name', 'last_name ','email','password','phone_number','is_active','verified','remember_token'
    ];
}
