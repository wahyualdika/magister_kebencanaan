<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelengkapanStrukturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapan_mtKuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('struktur_kurikulum_id')->unsigned();
            $table->foreign('struktur_kurikulum_id')->references('id')->on('struktur_kurikulum')->onDelete('cascade');

            $table->integer('kelengkapan_id')->unsigned();
            $table->foreign('kelengkapan_id')->references('id')->on('kelengkapan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelengkapan_mtKuliah');
    }
}
