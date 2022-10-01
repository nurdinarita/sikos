<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('user_id');
            $table->string('namakos');
            $table->integer('jumlahkamar');
            $table->bigInteger('hargaperbulan');
            $table->bigInteger('hargapertahun');
            // $table->string('nohppemilik');
            $table->text('gambarkos');
            $table->text('fasilitas');
            $table->string('koskhusus');
            $table->text('alamat');
            $table->text('status');
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
        Schema::dropIfExists('kos');
    }
}
