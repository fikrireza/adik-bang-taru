<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSimdaRealisasiAnggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simda_realisasi_anggaran', function(Blueprint $table) {
          $table->increments('id');
          $table->string('tahun');
          $table->string('no_spd');
          $table->integer('no_id');
          $table->integer('kd_urusan');
          $table->integer('kd_bidang');
          $table->integer('kd_unit');
          $table->integer('kd_sub');
          $table->integer('kd_prog');
          $table->integer('id_prog');
          $table->integer('kd_keg');
          $table->integer('kd_rek_1');
          $table->integer('kd_rek_2');
          $table->integer('kd_rek_3');
          $table->integer('kd_rek_4');
          $table->integer('kd_rek_5');
          $table->biginteger('nilai');
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
        //
    }
}
