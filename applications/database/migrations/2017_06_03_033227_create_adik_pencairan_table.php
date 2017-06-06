<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdikPencairanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adik_pencairan', function(Blueprint $table) {
          $table->increments('id');
          $table->string('no_rek')->nullable();
          $table->integer('id_item_kegiatan')->nullable();
          $table->string('termin');
          $table->string('nilai');
          $table->integer('flag_status');
          $table->integer('id_aktor');
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
