<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
    public function images(){
        return $this->hasMany(ProductImages::class);
    }
    public function cat(){
        return $this->hasOne(Category::class,'id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
