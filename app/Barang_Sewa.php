<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_Sewa extends Model
{
    public $table = "barang_sewas";

    public function guest(){
        return $this->belongsTo('App\Guest');
    }

    public function sewa(){
        return $this->belongsTo('App\Sewa');
    }
}
