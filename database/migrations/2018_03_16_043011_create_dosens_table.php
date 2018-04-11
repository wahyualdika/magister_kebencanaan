<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_dosen_tetap');
            $table->string('nidn');
            $table->date('tanggal_lahir');
            $table->string('jabatan_akademik');
            $table->string('gelar_akademik_s1');
            $table->string('asal_pt_s1');
            $table->string('bidang_keahlian_s1');
            $table->string('gelar_akademik_s2');
            $table->string('asal_pt_s2');
            $table->string('bidang_keahlian_s2');
            $table->string('gelar_akademik_s3');
            $table->string('asal_pt_s3');
            $table->string('bidang_keahlian_s3');
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
        Schema::drop('dosens');
        //
    }
}
