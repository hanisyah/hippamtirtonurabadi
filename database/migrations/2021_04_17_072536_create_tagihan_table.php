<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('idTagihan');
            $table->integer('pelanggan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('idPelanggan')->on('pelanggan')->onUpdate('cascade');
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('idPegawai')->on('pegawai')->onUpdate('cascade');
            $table->integer('golongan_id')->unsigned();
            $table->foreign('golongan_id')->references('idGolongan')->on('golongan')->onUpdate('cascade');
            $table->date('tanggalCatat');
            $table->string('tahun');
            $table->string('bulan');
            $table->integer('jumlahMeter');
            $table->integer('jumlah_meter_kemarin');
            $table->string('fotoMeteran');
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
        Schema::dropIfExists('tagihan');
    }
}
