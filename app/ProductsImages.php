<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $product_id
 * @property string     $images
 * @property int        $created_at
 * @property int        $updated_at
 */
class ProductsImages extends Model
{
    public $table = "products_images";
    public function product(){
        return $this->belongsTo(Products::class);
    }
}
