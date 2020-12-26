<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function acctransactions(){
        return $this->hasMany('App\AccTransaction','head');
    }
    // public function sales(){
    //     return $this->hasMany('App\Sales','cid');
    // }
}
