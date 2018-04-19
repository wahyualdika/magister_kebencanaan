<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivitasDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas_dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->nullable();
            $table->string('sks_ps_sendiri');
            $table->string('sks_ps_lain');
            $table->string('sks_ps_ptLain');
            $table->string('sks_penelitian');
            $table->string('sks_pengabdian_masyarakat');
            $table->string('sks_manajemen_ptSendiri');
            $table->string('sks_manajamen_ptLain');
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
        Schema::dropIfExists('aktivitas_dosen');
    }
}
