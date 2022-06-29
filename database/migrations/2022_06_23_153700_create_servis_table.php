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
        Schema::create('servis', function (Blueprint $table) {
            $table->string('id_servis')->primary();
            $table->string('id_user');
            $table->string('jenis_barang');
            $table->string('merk_barang');
            $table->string('tipe_barang');
            $table->dateTime('tgl_masuk_barang');
            $table->string('biaya_servis');
            $table->string('garansi');
            $table->dateTime('tgl_barang_diambil');
            $table->string('status');
        });

        //relasi ke tabel user
        Schema::table('servis', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servis');
    }
};
