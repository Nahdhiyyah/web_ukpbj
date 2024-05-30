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
        Schema::create('swakelolas', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('kd_klpd');
            $table->string('nama_klpd');
            $table->string('jenis_klpd');
            $table->string('kd_satker');
            $table->string('kd_satker_str');
            $table->string('nama_satker');
            $table->integer('kd_lpse');
            $table->integer('kd_swakelola_pct');
            $table->integer('kd_pkt_dce');
            $table->string('kd_rups');
            $table->string('nama_paket');
            $table->float('pagu');
            $table->float('total_realisasi');
            $table->float('nilai_pdn_pct');
            $table->string('sumber_dana');
            $table->float('nilai_umk_pct');
            $table->string('uraian_pekerjaan');
            $table->string('informasi_lainnya')->nullable();
            $table->string('tipe_swakelola')->nullable();
            $table->string('tipe_swakelola_nama')->nullable();
            $table->string('status_swakelola_pct');
            $table->string('status_swakelola_pct_ket');
            $table->string('alasan_pembatalan')->nullable();
            $table->string('nip_ppk');
            $table->string('nama_ppk');
            $table->dateTime('tgl_buat_paket');
            $table->dateTime('tgl_mulai_paket');
            $table->dateTime('tgl_selesai_paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swakelola_models');
    }
};