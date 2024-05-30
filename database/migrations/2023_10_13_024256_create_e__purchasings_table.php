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
        Schema::create('e__purchasings', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->string('kd_klpd');
            $table->integer('satker_id');
            $table->string('nama_satker')->nullable();
            $table->string('alamat_satker');
            $table->string('npwp_satker');
            $table->integer('kd_paket');
            $table->string('no_paket');
            $table->string('nama_paket');
            $table->integer('kd_rup');
            $table->string('nama_sumber_dana');
            $table->string('kode_anggaran');
            $table->integer('kd_komoditas');
            $table->integer('kd_produk');
            $table->integer('kd_penyedia');
            $table->integer('kd_penyedia_distributor');
            $table->integer('jml_jenis_produk');
            $table->float('total');
            $table->float('kuantitas');
            $table->float('harga_satuan');
            $table->float('ongkos_kirim')->nullable();
            $table->float('total_harga');
            $table->integer('kd_user_pokja');
            $table->string('no_telp_user_pokja');
            $table->string('email_user_pokja');
            $table->integer('kd_user_ppk');            
            $table->string('ppk-nip');
            $table->string('jabatan_ppk');
            $table->date('tanggal_buat_paket');
            $table->date('tanggal_edit_paket');
            $table->string('deskripsi')->nullable();
            $table->string('status_paket');
            $table->string('paket_status_str');
            $table->string('catatan_produk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e__purchasings');
    }
};