<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    public $table = "products_images";
    protected $fillable = [
        'products_id',
        'images'
    ];
    public function product(){
        return $this->belongsTo(Products::class);
    }
}
