<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
   protected $table = 'prestasi_dosens';

   public function dosen()
   {
       return $this->belongsTo('App\Dosen');
   }

   public function tingkat()
   {
       return $this->belongsTo('App\Tingkat');
   }
}
