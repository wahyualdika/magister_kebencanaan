<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisStaff extends Model
{
    protected $table = 'jenis_staff';

    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
