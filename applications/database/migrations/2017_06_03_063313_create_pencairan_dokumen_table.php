<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePencairanDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adik_pencairan_dokumen', function(Blueprint $table){
          $table->increments('id');
          $table->string('no_rekening');
          $table->string('dok_spp')->nullable();
          $table->string('dok_spm')->nullable();
          $table->string('dok_sp2d')->nullable();
          $table->string('dok_res_kontrak')->nullable();
          $table->string('dok_syarat_kontrak')->nullable();
          $table->string('dok_npd')->nullable();
          $table->string('dok_pho')->nullable();
          $table->string('dok_kwitansi')->nullable();
          $table->string('dok_mutual')->nullable();
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
