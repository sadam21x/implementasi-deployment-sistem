<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiTokoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_toko', function (Blueprint $table) {
            $table->string('barcode');
            $table->primary('barcode');
            $table->string('nama_toko');
            $table->double('latitude');
            $table->double('longitude');
            $table->double('accuracy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi_toko');
    }
}
