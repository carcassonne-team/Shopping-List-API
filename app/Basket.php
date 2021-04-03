<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'name', 'category_id'
    ];
}
