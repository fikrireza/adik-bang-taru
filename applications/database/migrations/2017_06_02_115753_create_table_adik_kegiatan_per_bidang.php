<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdikKegiatanPerBidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('adik_kegiatan_per_bidang', function(Blueprint $table){
        $table->increments('id');
        $table->date('tanggal');
        $table->integer('id_kegiatan')->unsigned()->nullable();
        $table->integer('id_bidang')->unsigned()->nullable();
        $table->timestamps();
      });

      Schema::table('adik_kegiatan_per_bidang', function($table) {
        $table->foreign('id_kegiatan')->references('id')->on('adik_kegiatan');
        $table->foreign('id_bidang')->references('id')->on('master_bidang');
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
