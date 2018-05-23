<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oprec_sie extends Model
{
    //public $table = "barang_sewas";

    public function sie(){
        return $this->belongsTo('App\Sie');
    }

    public function oprec(){
        return $this->belongsTo('App\Oprec');
    }
}
