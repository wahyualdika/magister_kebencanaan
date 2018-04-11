<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleSeminar extends Model
{
    protected $table = 'seminar_role';

    public function seminar()
    {
        return $this->hasMany('App\Seminar');
    }
}
