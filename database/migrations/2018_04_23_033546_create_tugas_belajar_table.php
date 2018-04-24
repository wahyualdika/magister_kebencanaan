<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasBelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_belajar', function (Blueprint $table){
            $table->increments('id');
            $table->integer('dosen_id');
            $table->string('jenjang_pendidikan_lanjut');
            $table->string('bidang_studi');
            $table->string('perguruan_tinggi');
            $table->string('negara');
            $table->string('tahun_mulai_studi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_belajar');
    }
}
