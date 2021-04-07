<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'name', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
}
