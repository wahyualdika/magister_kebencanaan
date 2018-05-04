<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluasiLulusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_lulusan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_kemampuan');
            $table->string('sangat_baik');
            $table->string('baik');
            $table->string('cukup');
            $table->string('kurang');
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
        Schema::dropIfExists('evaluasi_lulusan');
    }
}
