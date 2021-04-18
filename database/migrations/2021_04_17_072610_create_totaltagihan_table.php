<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotaltagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totaltagihan', function (Blueprint $table) {
            $table->increments('idTotalTagihan');
            $table->integer('tagihan_id')->unsigned();
            $table->foreign('tagihan_id')->references('idTagihan')->on('tagihan')->onUpdate('cascade');
            $table->integer('subTotal');
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
        Schema::dropIfExists('totaltagihan');
    }
}
