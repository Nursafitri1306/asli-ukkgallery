<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->BigIncrements('fotoId');
            $table->string('judulFoto');
            $table->text('deskripsiFoto');
            $table->date('tanggalUnggah');
            $table->string('lokasiFile');
            $table->UnsignedBigInteger('albumId');
            $table->foreign('albumId')->references('albumId')->on('albums')->onDelete('cascade')->onUpdate('cascade');
            $table->UnsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('fotos');
    }
};
