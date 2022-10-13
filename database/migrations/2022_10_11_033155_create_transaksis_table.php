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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('produk_id');
            $table->string('nomor_antrian');
            $table->date('tanggal');
            $table->string('deskripsi')->nullable();
            $table->integer('kuantitas');
            $table->integer('harga_produk');
            $table->integer('produk');
            $table->integer('total_harga');
            $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Approved');
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
        Schema::dropIfExists('transaksis');
    }
};
