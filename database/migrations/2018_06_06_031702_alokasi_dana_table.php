<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlokasiDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alokasi_dana', function (Blueprint $table) {
          $table->increments('id');
          $table->string('sumber_dana_id');
          $table->string('jenis_dana');
          $table->string('ts1');
          $table->string('ts2');
          $table->string('ts');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alokasi_dana');
    }
}
