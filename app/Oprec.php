<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oprec extends Model
{
    public function oprec_sie(){
        return $this->hasMany('App\Oprec_sie');
    }
}
