<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = ['title', 'description', 'category_id'];


    public function category()
    {
        return $this->belongsTo(category::class, 'id', 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(product::class);
    }
    public function abc()
    {

        return $this->hasOne(category::class, 'id', 'category_id');
    }
}
