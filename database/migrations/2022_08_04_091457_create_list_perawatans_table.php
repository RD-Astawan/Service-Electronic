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
        Schema::create('list_perawatans', function (Blueprint $table) {
            $table->id('id_list_perawatan');
            $table->unsignedBigInteger('referensi_id');
            $table->string('referensi_type');
            $table->string('list_tips');
        });
        
        // //relasi ke tabel tips
        // Schema::table('list_perawatans', function (Blueprint $table) {
        //     $table->foreign('id_tips')->references('id_tips')->on('tip_perawatans')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_perawatans');
    }
};
