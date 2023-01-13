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
        Schema::create('bokings', function (Blueprint $table) {
            $table->id('id_boking');
            $table->integer('jml_orang');
            $table->char('kd_boking');
            $table->date('tgl_boking');
            $table->time('jam_boking');
            $table->time('jam_keluar');
            $table->integer('satuan_harga');
            $table->enum('status', ['pending', 'sukses']);
            $table->foreignId('id_user')->nullable();
            $table->foreignId('id_space')->nullable();
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id_user')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_space')
            ->references('id_space')
            ->on('spaceworks')
            ->onDelete('set null')
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
        Schema::dropIfExists('bokings');
    }
};
