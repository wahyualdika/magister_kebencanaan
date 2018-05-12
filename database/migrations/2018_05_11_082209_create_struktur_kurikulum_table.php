<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrukturKurikulumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struktur_kurikulum', function (Blueprint $table) {
            $table->increments('id');
            $table->string('semester');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->string('bobot_sks');
            $table->string('sks_dlm_kurikulum');
            $table->string('bobot_tugas');
            $table->string('kelengkapan');
            $table->string('bobot_sks');
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
        //
    }
}
