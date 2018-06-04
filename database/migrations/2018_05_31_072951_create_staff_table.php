<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_staff');
            $table->string('jumlah_s1');
            $table->string('jumlah_s2');
            $table->string('jumlah_s3');
            $table->string('jumlah_d4');
            $table->string('jumlah_d3');
            $table->string('jumlah_d1');
            $table->string('jumlah_sma/k');
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
        Schema::dropIfExists('staff');
    }
}
