<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SistemPengolahan extends Model
{
    protected $table = 'sistem_pengolahan';

    public function data()
    {
        return $this->belongsToMany('App\AksesibilitasData','akses_data','sistem_pengolahan_id','aksesibilitas_data_id');
    }
}
