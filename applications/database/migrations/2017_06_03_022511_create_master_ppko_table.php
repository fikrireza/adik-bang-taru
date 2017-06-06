<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterPpkoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_ppko', function(Blueprint $table){
          $table->increments('id');
          $table->string('nip_sapk');
          $table->string('nama');
          $table->integer('id_bidang')->unsigned();
          $table->integer('id_aktor')->unsigned();
          $table->integer('flag_status')->unsigned();
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
