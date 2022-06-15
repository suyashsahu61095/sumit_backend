<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = "alerts";
    protected $fillable = [
        'title',
        'image',
        'description',
        'hyper_link',
        'posted_by'
        
    ];
}
