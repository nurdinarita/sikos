<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghuniKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghuni_kos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kos_id');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('nama_kamar');
            $table->date('tanggal_mulai_sewa');
            $table->date('tanggal_akhir_sewa');
            $table->integer('status');
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
        Schema::dropIfExists('penghuni_kos');
    }
}
