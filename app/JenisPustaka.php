<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPustaka extends Model
{
    protected $table = 'jenis_pustaka';

    public function pustaka()
    {
        return $this->hasMany('App\Pustaka');
    }
}
