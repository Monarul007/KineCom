<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = ['attribute_id','value','products_id', 'quantity', 'price'];
    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function attribute(){
        return $this->belongsTo(ProductAttributes::class);
    }
    public function attributesValues(){
        return $this->belongsToMany(AttributeValue::class);
    }
}
