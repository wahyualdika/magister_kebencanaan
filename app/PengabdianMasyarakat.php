<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengabdianMasyarakat extends Model
{
    protected $table = 'pengabdian_masyarakat';

    public function sumberDana()
    {
        return $this->belongsTo('App\SumberDana','sumber_dana_id');
    }
}
