<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonTender extends Model
{
    use HasFactory;
    public $table = 'ukpbj.non_tenders';
    protected $fillable = [
        "tahun_anggaran",
        "kd_klpd",
        "nama_klpd",
        "jenis_klpd",
        "kd_satker",
        "kd_satker_str",
        "nama_satker",
        "kd_lpse",
        "nama_lpse",
        "kd_nontender",
        "kd_pkt_dce",
        "kd_rup",
        "nama_paket",
        "pagu",
        "hps",
        "nilai_penawaran",
        "nilai_terkoreksi",
        "nilai_negosiasi",
        "nilai_kontrak",
        "nilai_pdn_kontrak",
        "nilai_umk_kontrak",
        "sumber_dana",
        "mak",
        "kualifikasi_paket",
        "jenis_pengadaan",
        "mtd_pemilihan",
        "kontrak_pembayaran",
        "status_nontender",
        "tgl_pengumuman_nontender",
        "tgl_selesai_nontender",
        "dibuat_oleh",
        "nip_pembuat_paket",
        "nama_pembuat_paket",
        "kd_penyedia",
        "nama_penyedia",
        "npwp_penyedia",
        "url_lpse"
    ];
}