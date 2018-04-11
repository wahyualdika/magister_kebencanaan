<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';

    public function tingkat()
    {
        return $this->belongsTo('App\Tingkat');
    }

    public function dosen()
    {
        return $this->belongsToMany('App\Dosen','dosen_publikasi','publikasi_id','dosen_id');
    }
}
