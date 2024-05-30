<?php

namespace App\Http\Controllers\Konsultasi;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi\KonsultasiModel;
use PDF;

class RekapKonsultasiController extends Controller
{
    public function index()
    {
        $konsultasi = KonsultasiModel::get();
        $konsul_selesai = KonsultasiModel::where('status', 'Selesai')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();
        $konsul_diproses = KonsultasiModel::where('status', 'Sedang diproses')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();
        $konsul_butuhfeedback = KonsultasiModel::where('status', 'Butuh feedback')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();
        $konsul_terkirim = KonsultasiModel::where('status', 'Terkirim')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        return view('admin.konsultasi.rekap_konsultasi', compact('konsul_selesai', 'konsul_diproses', 'konsul_butuhfeedback', 'konsul_terkirim', 'konsultasi'));
    }

    public function cetakPdf()
    {
        $konsultasi = KonsultasiModel::get();
        $konsul_selesai = KonsultasiModel::where('status', 'Selesai')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();
        $konsul_diproses = KonsultasiModel::where('status', 'Sedang diproses')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();
        $konsul_butuhfeedback = KonsultasiModel::where('status', 'Butuh feedback')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();
        $konsul_terkirim = KonsultasiModel::where('status', 'Terkirim')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('is_deleted', 'no')
            ->count();

        $data = [
            'konsul_selesai' => $konsul_selesai,
            'konsul_diproses' => $konsul_diproses,
            'konsul_butuhfeedback' => $konsul_butuhfeedback,
            'konsul_terkirim' => $konsul_terkirim,
            'konsultasi' => $konsultasi,
        ];

        $pdf = PDF::loadView('admin.konsultasi.tabel_rekap', $data);

        // $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('laporan-konsultasi.pdf');
    }
}