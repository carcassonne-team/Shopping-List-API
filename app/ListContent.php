<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListContent extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'product_list_id','product_id'
    ];

    public function productList()
    {
        return $this->belongsTo(ProductList::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
