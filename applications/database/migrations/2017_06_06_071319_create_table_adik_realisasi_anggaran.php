<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdikRealisasiAnggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adik_realisasi_anggaran', function(Blueprint $table){
          $table->increments('id');
          $table->string('kode_program');
          $table->string('kode_kegiatan');
          $table->string('kode_item');
          $table->string('no_spd');
          $table->integer('triwulan');
          $table->string('tahun');
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
