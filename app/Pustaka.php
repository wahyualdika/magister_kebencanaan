<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pustaka extends Model
{
    protected $table = 'pustaka';

    public function jenisPustaka()
    {
        return $this->belongsTo('App\JenisPustaka','jenis_pustaka_id');
    }
}
