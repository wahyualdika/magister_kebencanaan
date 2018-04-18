<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanAkademik extends Model
{
    protected $table = 'jabatan_akademik';

    public function dosen()
    {
       return $this->hasMany('App\Dosen');
    }

    public function bimbingan()
    {
       return $this->hasMany('App\PembimbingTesis');
    }
}
