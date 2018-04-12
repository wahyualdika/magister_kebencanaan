<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembimbingTesis extends Model
{
    protected $table = 'bimbingan';

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }
}
