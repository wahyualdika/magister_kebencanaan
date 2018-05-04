<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    public function penelitian()
    {
        return $this->hasOne('App\PenelitianMahasiswa');
    }
}
