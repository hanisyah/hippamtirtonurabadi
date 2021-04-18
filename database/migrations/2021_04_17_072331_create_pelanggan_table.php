<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->increments('idPelanggan');
            $table->integer('golongan_id')->unsigned();
            $table->foreign('golongan_id')->references('idGolongan')->on('golongan')->onUpdate('cascade');
            $table->string('namaPelanggan');
            $table->string('alamat');
            $table->string('noHP');
            $table->date('tanggalPasang');
            $table->string('kodeMeter');
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
        Schema::dropIfExists('pelanggan');
    }
}
