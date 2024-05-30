<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwakelolaModel extends Model
{
    use HasFactory;
    public $table= 'swakelolas';
    protected $fillable = [
        'tahun_anggaran',
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
        'kd_lpse',
        'kd_swakelola_pct',
        'kd_pkt_dce',
        'kd_rups',
        'nama_paket',
        'pagu',
        'total_realisasi',
        'nilai_pdn_pct',
        'sumber_dana',
        'nilai_umk_pct',
        'uraian_pekerjaan',
        'informasi_lainnya',
        'tipe_swakelola',
        'tipe_swakelola_nama',
        'status_swakelola_pct',
        'status_swakelola_pct_ket',
        'alasan_pembatalan',
        'nip_ppk',
        'nama_ppk',
        'tgl_buat_paket',
        'tgl_mulai_paket',
        'tgl_selesai_paket',
    ];
}