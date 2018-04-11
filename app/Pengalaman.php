<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalamans';

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function tingkat()
    {
        return $this->belongsTo('App\Tingkat');
    }
}
