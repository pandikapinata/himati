<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public function fungsionaris(){
        return $this->hasMany('App\Fungsionaris');
    }
}
