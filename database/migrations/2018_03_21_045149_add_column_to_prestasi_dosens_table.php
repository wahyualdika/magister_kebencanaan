<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToPrestasiDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestasi_dosens', function (Blueprint $table) {
            $table->string('nama_prestasi');
            $table->string('tahun_pencapaian');
            $table->string('tingkat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestasi_dosens', function (Blueprint $table) {
            $table->dropColumn(['nama_prestasi', 'tahun_pencapaian', 'tingkat']);
        });
    }
}
