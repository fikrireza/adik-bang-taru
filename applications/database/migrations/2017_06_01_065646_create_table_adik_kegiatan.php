<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdikKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adik_kegiatan', function(Blueprint $table){
          $table->increments('id');
          $table->string('nama_kegiatan');
          $table->integer('id_program')->unsigned()->nullable();
          $table->timestamps();
        });

        Schema::table('adik_kegiatan', function(Blueprint $table){
          $table->foreign('id_program')->references('id')->on('adik_program');
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
