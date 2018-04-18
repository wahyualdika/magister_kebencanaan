<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembimbingTesis extends Model
{
    protected $table = 'bimbingan';

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\JabatanAkademik','jabatan_akademik_id');
    }
}
