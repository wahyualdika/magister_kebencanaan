<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaDanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhs_dan_dana', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jumlah_mahasiswa_ts');
            $table->string('jumlah_dana_ts');
            $table->string('jumlah_mahasiswa_ts-1');
            $table->string('jumlah_dana_ts-1');
            $table->string('jumlah_mahasiswa_ts-3');
            $table->string('jumlah_dana_ts-3');
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
        Schema::dropIfExists('mhs_dan_dana');
    }
}
