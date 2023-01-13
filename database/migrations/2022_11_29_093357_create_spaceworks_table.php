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
        Schema::create('spaceworks', function (Blueprint $table) {
            $table->id('id_space');
            $table->string('image');
            $table->string('pemilik_space');
            $table->string('nama_space');
            $table->integer('harga');
            $table->integer('rate');
            $table->string('lokasi');
            $table->char('no_rek')->unique();
            $table->foreignId('id_pemilik')->nullable();
            $table->foreignId('id_fasilitas')->nullable();
            $table->timestamps();

            $table->foreign('id_fasilitas')
            ->references('id_fasilitas')
            ->on('fasilitas')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('id_pemilik')
            ->references('id_user')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaceworks');
    }
};
