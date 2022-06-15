<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = "user_types";
	 protected $fillable = [
        'name', 'email', 'password', 'status','user_type'
    ];
	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'activation_key', 'remember_token',
    ];
}
