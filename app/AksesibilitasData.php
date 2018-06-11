<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AksesibilitasData extends Model
{
    protected $table = 'aksesibilitas_data';

    public function pengolahan()
    {
        return $this->belongsToMany('App\SistemPengolahan','akses_data','aksesibilitas_data_id','sistem_pengolahan_id');
    }

    public function jenisData()
    {
        return $this->belongsTo('App\JenisData','jenis_data_id');
    }
}
