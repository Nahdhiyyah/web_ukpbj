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
        Schema::create('tender', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('kd_klpd');
            $table->text('nama_klpd');
            $table->string('jenis_klpd');
            $table->string('kd_satker');
            $table->string('kd_satker_str');
            $table->text('nama_satker');
            $table->integer('kd_lpse');
            $table->text('nama_lpse');
            $table->integer('kd_tender');
            $table->integer('kd_pkt_dce');
            $table->string('kd_rup');
            $table->text('nama_paket');
            $table->float('pagu');
            $table->float('hps');
            $table->string('sumber_dana');
            $table->text('mak');
            $table->text('kualifikasi_paket');
            $table->text('jenis_pengadaan');
            $table->string('mtd_pemilihan');
            $table->string('mtd_evaluasi');
            $table->string('mtd_kualifikasi');
            $table->string('kontrak_pembayaran');
            $table->string('status_tender');
            $table->text('tgl_pengumuman_tender');
            $table->text('tgl_penetapan_pemenang');
            $table->text('url_lpse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tender');
    }
};