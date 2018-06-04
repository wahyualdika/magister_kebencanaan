<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuangKerja extends Model
{
    protected $table = 'ruang_kerja';

    public function ruangTipe()
    {
        return $this->belongsTo('App\RuangTipe','ruang_id');
    }
}
