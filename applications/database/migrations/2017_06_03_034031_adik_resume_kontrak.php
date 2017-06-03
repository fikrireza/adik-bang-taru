<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdikResumeKontrak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adik_resume_kontrak', function(Blueprint $table) {
          $table->increments('id');
          $table->string('no_rekening')->nullable();
          $table->string('id_item_kegiatan')->nullable();
          $table->string('no_dpa')->nullable();
          $table->date('tanggal_dpa')->nullable();
          $table->string('no_kontrak')->nullable();
          $table->date('tanggal_kontrak')->nullable();
          $table->string('nama_perusahaan')->nullable();
          $table->string('alamat_perusahaan')->nullable();
          $table->string('nilai_kontrak')->nullable();
          $table->string('no_ba_kemajuan')->nullable();
          $table->date('tanggal_ba_kemajuan')->nullable();
          $table->string('no_ba_pembayaran')->nullable();
          $table->date('tanggal_ba_pembayaran')->nullable();
          $table->string('no_ba_penyelesaian')->nullable();
          $table->date('tanggal_ba_penyelesaian')->nullable();
          $table->string('no_ba_serah_terima')->nullable();
          $table->date('tanggal_ba_serah_terima')->nullable();
          $table->integer('uraian_volume')->nullable();
          $table->text('cara_pembayaran')->nullable();
          $table->date('jangka_waktu_awal')->nullable();
          $table->date('jangka_waktu_akhir')->nullable();
          $table->date('tanggal_penyelesaian')->nullable();
          $table->text('ketentuan_sanksi')->nullable();
          $table->string('npwp')->nullable();
          $table->string('no_rekening_perusahaan')->nullable();
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
