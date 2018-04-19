<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivitasDosen extends Model
{
    protected $table = 'aktivitas_dosen';

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }
}
