<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKemampuan extends Model
{
    protected $table = 'jenis_kemampuan';

    public function evaluasi()
    {
        return $this->hasOne('App\EvaluasiLulusan');
    }
}
