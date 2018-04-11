<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenPenelitianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen_penelitian', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('penelitian_id')->unsigned();
                $table->foreign('penelitian_id')->references('id')->on('penelitian')->onDelete('cascade');

                $table->integer('dosen_id')->unsigned();
                $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen_penelitian');
    }
}
