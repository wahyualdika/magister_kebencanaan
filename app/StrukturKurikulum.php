<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StrukturKurikulum extends Model
{
    protected $table = 'struktur_kurikulum';

    function kelengkapan()
    {
        return $this->belongsToMany('App\Kelengkapan','kelengkapan_mtkuliah','struktur_kurikulum_id','kelengkapan_id');
    }
}
