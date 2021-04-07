<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

}
