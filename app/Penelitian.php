<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $table='penelitian';

    public function dosen()
    {
        return $this->belongsToMany('App\Dosen','dosen_penelitian','penelitian_id','dosen_id');
    }

    public function sumberDana()
    {
        return $this->belongsTo('App\SumberDana','sumber_dana_id');
    }
}
