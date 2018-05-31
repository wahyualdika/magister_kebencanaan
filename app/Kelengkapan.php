<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    protected $table = 'kelengkapan';

    function strukturKurikulum()
    {
        return $this->belongsToMany('App\StrukturKurikulum','kelengkapan_mtkuliah','kelengkapan_id','struktur_kurikulum_id');
    }
}
