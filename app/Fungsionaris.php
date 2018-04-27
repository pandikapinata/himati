<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fungsionaris extends Model
{
    protected $table = "fungsionaris";

    public function jabatan(){
        return $this->belongsTo('App\Jabatan');
    }
}
