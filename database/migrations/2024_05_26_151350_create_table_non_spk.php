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
        Schema::create('non_spk', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('kd_klpd');
            $table->text('nama_klpd');
            $table->string('jenis_klpd');
            $table->string('kd_satker');
            $table->text('kd_satker_str');
            $table->text('nama_satker');
            $table->integer('kd_lpse');
            $table->integer('kd_nontender_pct');
            $table->integer('kd_pkt_dce');
            $table->string('kd_rup');
            $table->text('nama_paket');
            $table->integer('pagu');
            $table->integer('total_realisasi');
            $table->integer('nilai_pdn_pct');
            $table->integer('nilai_umk_pct');
            $table->string('sumber_dana');
            $table->text('uraian_pekerjaan');
            $table->text('informasi_lainnya')->nullable();
            $table->string('kategori_pengadaan');
            $table->text('mtd_pemilihan');
            $table->string('bukti_pembayaran');
            $table->string('status_nontender_pct');
            $table->string('status_nontender_pct_ket');
            $table->string('alasan_pembatalan')->nullable();
            $table->string('nip_ppk');
            $table->text('nama_ppk');
            $table->datetime('tgl_buat_paket');
            $table->datetime('tgl_mulai_paket');
            $table->datetime('tgl_selesai_paket');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_spk');
    }
};