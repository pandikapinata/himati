<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function sewa(){
        return $this->hasMany('App\Sewa');
    }
}
