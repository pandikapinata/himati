<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    public function guest(){
        return $this->belongsTo('App\Guest');
    }

    public function oprec(){
        return $this->belongsTo('App\Oprec');
    }
}
