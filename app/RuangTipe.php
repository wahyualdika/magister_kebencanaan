<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuangTipe extends Model
{
    protected $table = 'ruang';

    public function ruangKerja()
    {
        return $this->hasMany('App\RuangKerja');
    }
}
