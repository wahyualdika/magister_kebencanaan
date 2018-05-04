<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluasiLulusan extends Model
{
    protected $table = 'evaluasi_lulusan';

    public function jenisKemampuan()
    {
        return $this->belongsTo('App\JenisKemampuan');
    }
}
