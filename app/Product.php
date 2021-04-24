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

    public function list_content()
    {
        return $this->hasMany(ListContent::class);
    }
}
