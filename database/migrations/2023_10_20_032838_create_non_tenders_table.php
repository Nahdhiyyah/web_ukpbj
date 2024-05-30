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
        Schema::create('non_tenders', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->string('kd_klpd');
            $table->string('nama_klpd');
            $table->string('jenis_klpd');
            $table->string('kd_satker');
            $table->string('kd_satker_str');
            $table->string('nama_satker');
            $table->integer('kd_lpse');
            $table->string('nama-lpse');
            $table->integer('kd_nontender');
            $table->integer('kd_pkt_dce');
            $table->string('kd_rup');
            $table->string('nama_paket');
            $table->float('pagu');
            $table->float('hps');
            $table->float('nilai_penawaran');
            $table->float('nilai_terkoreksi');
            $table->float('nilai_negosiasi');
            $table->float('nilai_kontrak');
            $table->integer('nilai_pdn_kontrak');
            $table->integer('nilai_umk_kontrak');
            $table->string('sumber_dana');
            $table->string('mak');
            $table->string('kualifikasi_paket')->nullable();
            $table->string('jenis_pengadaan');
            $table->string('mtd_pemilihan');
            $table->string('kontrak_pembayaran');
            $table->string('status_nontender');
            $table->dateTime('tanggal_pengumuman_nontender');
            $table->dateTime('tanggal_selesai_nontender');
            $table->string('dibuat_oleh');
            $table->string('nip_pembuat_paket');
            $table->string('nama_pembuat_paket');
            $table->integer('kd_penyedia');
            $table->string('nama_penyedia');
            $table->string('npwp_penyedia');
            $table->string('url_lpse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_tenders');
    }
};