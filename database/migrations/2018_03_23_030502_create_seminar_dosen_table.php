<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->nullable();
            $table->integer('kegiatan_seminar_id')->nullable();
            $table->string('tempat');
            $table->string('tahun');
            $table->string('seminar_role_id');
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
        Schema::dropIfExists('seminar_dosen');
    }
}
