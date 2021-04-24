<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SharedList extends Model
{

    public $timestamps=false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_list()
    {
        return $this->belongsTo(ProductList::class);
    }

    public function list_content()
    {
        return $this->belongsTo(ListContent::class);
    }
}
