<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    protected $table = 'kegiatan_seminar';

    public function seminar()
    {
        return $this->hasMany('App\Seminar');
    }
}
