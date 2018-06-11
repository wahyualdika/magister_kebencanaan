<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAksesJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aksesibilitas_data_id');
            $table->foreign('aksesibilitas_data_id')->references('id')->on('aksesibilitas_data')->onDelete('cascade');

            $table->integer('sistem_pengolahan_id');
            $table->foreign('sistem_pengolahan_id')->references('id')->on('sistem_pengolahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akses_data');
    }
}
