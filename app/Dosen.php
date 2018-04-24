<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';

    public function prestasi()
    {
        return $this->hasMany('App\Prestasi');
    }

    public function pengalaman()
    {
        return $this->hasMany('App\Pengalaman');
    }

    public function seminar()
    {
        return $this->hasMany('App\Seminar');
    }

    public function publikasi()
    {
        return $this->belongsToMany('App\Publikasi','dosen_publikasi','dosen_id','publikasi_id');
    }

    public function penelitian()
    {
        return $this->belongsToMany('App\Penelitian','dosen_penelitian','dosen_id','penelitian_id');
    }

    public function bimbingan()
    {
        return $this->hasMany('App\PembimbingTesis');
    }

    public function jabatanAkademik()
    {
        return $this->belongsTo('App\JabatanAkademik','jabatan_akademik_id');
    }

    public function aktivitas()
    {
        return $this->hasMany('App\AktivitasDosen');
    }

    public function tugasBelajar()
    {
        return $this->hasMany('App\TugasBelajar');
    }
}
