<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function barang_sewa(){
        return $this->hasMany('App\Barang_Sewa');
    }
}
