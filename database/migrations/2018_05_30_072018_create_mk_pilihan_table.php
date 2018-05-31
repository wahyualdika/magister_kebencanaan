<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkPilihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mk_pilihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_mk');
            $table->string('kode_mk');
            $table->string('semester');
            $table->string('bobot_sks');
            $table->string('unit_penyelenggara');
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
        Schema::dropIfExists('mk_pilihan');
    }
}
