<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = 'seminar_dosen';

    public function jenis()
    {
        return $this->belongsTo('App\JenisKegiatan','kegiatan_seminar_id');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function role()
    {
        return $this->belongsTo('App\RoleSeminar','seminar_role_id');
    }
}
