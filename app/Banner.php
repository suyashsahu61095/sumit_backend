<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "banners";
    protected $fillable = [
        'title',
        'banner_image',
        'hyper_link'
    ];
}
