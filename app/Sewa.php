<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    public function barang_sewa(){
        return $this->hasMany('App\Barang_Sewa');
    }

    public function guest(){
        return $this->belongsTo('App\Guest');
    }
}
