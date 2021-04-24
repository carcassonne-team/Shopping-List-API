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

    public function list_content()
    {
        return $this->hasMany(ListContent::class);
    }

    public function shared_list()
    {
        return $this->hasMany(SharedList::class);
    }


}
