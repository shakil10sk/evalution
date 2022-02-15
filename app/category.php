<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title', 'description', 'subcategory_id', 'slug'];



    public function products()
    {
        return $this->belongsToMany(product::class);
    }
}
