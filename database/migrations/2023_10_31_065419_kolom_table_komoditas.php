<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('komoditas', function (Blueprint $table) {
            $table->integer('kd_komoditas'); 
            $table->string('nama_komoditas');
            $table->string('jenis_katalog');
            $table->string('nama_instansi_katalog');
            $table->string('kd_instansi_katalog');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('komoditas', function (Blueprint $table) {
            //
        });
    }
};