<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePresentaseFisik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adik_presentase_fisik', function($table) {
          $table->increments('id');
          $table->string('no_rekening_kegiatan')->nullable();
          $table->string('id_item_kegiatan')->nullable();
          $table->integer('nilai');
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
