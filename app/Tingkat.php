<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    protected $table = 'tingkat';

    public function dosenPrestasi()
    {
        return $this->hasMany('App\Prestasi');
    }

    public function dosenPengalaman()
    {
        return $this->hasMany('App\Pengalaman');
    }

    public function publikasi()
    {
        return $this->hasMany('App\Publikasi');
    }
}
