<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisData extends Model
{
    protected $table = 'jenis_data';

    public function akses()
    {
        return $this->hasMany('App\AksesibilitasData');
    }

}
