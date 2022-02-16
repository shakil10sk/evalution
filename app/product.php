<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // use App\HasFactory;

    protected $fillable = [
        'title',
        'description',
        'subcategory_id',
        'price',
        'thumbnail',
    ];

    public function subcategories()
    {
        return $this->belongsToMany(subcategory::class);
    }
    public function subcat()
    {
        return $this->hasMany(subcategory::class);
    }

    public function scat()
    {
        return $this->hasMany(\App\subcategory::class, 'id', 'subcategory_id');
    }
}
