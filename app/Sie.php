<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sie extends Model
{
    public function oprec_sie(){
        return $this->hasMany('App\Oprec_sie');
    }
}
