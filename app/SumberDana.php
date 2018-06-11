<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    protected $table='sumber_dana';

    public function penelitian()
    {
        return $this->hasMany('App\Penelitian');
    }

    public function pengabdian()
    {
        return $this->hasMany('App\PengabdianMasyarakat');
    }

    public function alokasi()
    {
      return $this->hasMany('App\AlokasiDana', 'sumber_dana_id');
    }
}
