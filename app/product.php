<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'subcategory_id',
        'price',
        'thumbnail',
    ];


    public function categories()
    {
        return $this->belongsToMany(category::class);
    }

    public function subcategories()
    {
        return $this->belongsToMany(subcategory::class);
    }
}
