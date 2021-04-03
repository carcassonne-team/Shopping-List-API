<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps=false;

    protected $fillable = [
        'name', 'created_by_user'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
