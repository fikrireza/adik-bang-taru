<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdikItemKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('adik_item_kegiatan', function(Blueprint $table){
        $table->increments('id');
        $table->string('nama_item_kegiatan');
        $table->string('no_rekening');
        $table->string('satuan_1')->nullable();
        $table->integer('nilai_1');
        $table->string('satuan_2')->nullable();
        $table->integer('nilai_2');
        $table->string('satuan_3')->nullable();
        $table->integer('nilai_3');
        $table->biginteger('nilai_rp');
        $table->biginteger('total');
        $table->string('expr1');
        $table->integer('id_kegiatan')->unsigned()->nullable();
        $table->timestamps();
      });

      Schema::table('adik_item_kegiatan', function(Blueprint $table){
        $table->foreign('id_kegiatan')->references('id')->on('adik_kegiatan');
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
