<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMhsDanLulusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhs_dan_lulusan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('daya_tampung');
            $table->string('ikut_seleksi');
            $table->string('lulus_seleksi');
            $table->string('mhsbr_bukan_transfer');
            $table->string('mhsbr_transfer');
            $table->string('total_mhs_bknTransfer');
            $table->string('total_mhs_transfer');
            $table->string('lulusan_bkn_transfer');
            $table->string('lulusan_transfer');
            $table->string('ipk_reg_min');
            $table->string('ipk_reg_rat');
            $table->string('ipk_reg_mak');
            $table->string('jumlah_mahasiswa_wna');
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
        Schema::dropIfExists('mhs_dan_lulusan');
    }
}
