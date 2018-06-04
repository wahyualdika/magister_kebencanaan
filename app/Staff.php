<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    public function jenisStaff()
    {
        return $this->belongsTo('App\JenisStaff','jenis_staff_id');
    }
}
