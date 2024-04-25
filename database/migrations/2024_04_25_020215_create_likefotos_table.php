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
        Schema::create('likefotos', function (Blueprint $table) {
            $table->BigIncrements('likeId');
            $table->UnsignedBigInteger('fotoId');
            $table->foreign('fotoId')->references('fotoId')->on('fotos')->onDelete('cascade')->onUpdate('cascade');
            $table->UnsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggalLike');
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
        Schema::dropIfExists('likefotos');
    }
};
