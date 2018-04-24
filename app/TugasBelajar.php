<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasBelajar extends Model
{
    protected $table = 'tugas_belajar';

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }
}
