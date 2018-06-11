<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlokasiDana extends Model
{
    protected $table = 'alokasi_dana';

    public function sumberDana()
    {
      return $this->belongsTo('App\SumberDana','sumber_dana_id');
    }
}
