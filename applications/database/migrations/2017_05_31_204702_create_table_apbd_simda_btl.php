<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableApbdSimdaBtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('simda_apbd_btl', function(Blueprint $table){
        $table->increments('id');
        $table->string('tahun');
        $table->integer('kd_urusan');
        $table->integer('kd_bidang');
        $table->integer('kd_unit');
        $table->integer('kd_sub');
        $table->integer('kd_prog');
        $table->string('ket_program');
        $table->string('nm_sub_unit');
        $table->string('ket_kegiatan');
        $table->integer('kd_keg');
        $table->integer('kd_rek_1');
        $table->integer('kd_rek_2');
        $table->integer('kd_rek_3');
        $table->integer('kd_rek_4');
        $table->integer('kd_rek_5');
        $table->string('keterangan');
        $table->string('sat_1')->nullable();
        $table->integer('nilai_1');
        $table->string('sat_2')->nullable();
        $table->integer('nilai_2');
        $table->string('sat_3')->nullable();
        $table->integer('nilai_3');
        $table->biginteger('nilai_rp');
        $table->biginteger('total');
        $table->string('expr1');
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
