<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenelitianMahasiswa extends Model
{
    protected $table = 'penelitian_mahasiswa';

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }
}
