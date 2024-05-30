<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\PengaduanModel;
use PDF;

class RekapPengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = PengaduanModel::get();
        $pengaduan_selesai = PengaduanModel::where('status', 'Selesai')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        $pengaduan_diproses = PengaduanModel::where('status', 'Sedang diproses')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        $pengaduan_terkirim = PengaduanModel::where('status', 'Terkirim')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        return view('admin.pengaduan.rekap_pengaduan', compact('pengaduan_selesai', 'pengaduan_diproses', 'pengaduan_terkirim', 'pengaduan'));
    }

    public function cetakPdf()
    {
        $pengaduan = PengaduanModel::get();
        $pengaduan_selesai = PengaduanModel::where('status', 'Selesai')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        $pengaduan_diproses = PengaduanModel::where('status', 'Sedang diproses')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        $pengaduan_terkirim = PengaduanModel::where('status', 'Terkirim')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        $data = [
            'pengaduan_selesai' => $pengaduan_selesai,
            'pengaduan_diproses' => $pengaduan_diproses,
            'pengaduan_terkirim' => $pengaduan_terkirim,
            'pengaduan' => $pengaduan,
        ];

        $pdf = PDF::loadView('admin.pengaduan.tabel_rekap', $data);

        // $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('rekapitulasi-pengaduan.pdf');
    }
}