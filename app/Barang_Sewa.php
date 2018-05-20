<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_Sewa extends Model
{
    public $table = "barang_sewas";

    public function barang(){
        return $this->belongsTo('App\Barang');
    }

    public function sewa(){
        return $this->belongsTo('App\Sewa');
    }
}
