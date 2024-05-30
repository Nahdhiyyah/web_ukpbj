<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {
                $tender = DB::table('tender')->get();
                return view('admin.data_pengadaan.tender', compact('tender'));
            } else {
                // return view('error');
                Alert::error('error', 'Anda tidak bisa mengakses halaman yang anda tuju!');

            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function display_tender(Request $request)
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb-2/api/dcb2fcee-bdde-48ce-b32d-31b1ffeba0d5/json/10195/SPSE-TenderSelesai/tipe/4:4/parameter/'.$ta.':72';

        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];
        DB::table('tender')->delete();
        foreach ($jsonData as $key) {
            // insert data json to table database
            $query = DB::table('tender')->insert([
                'tahun_anggaran' => $key['tahun_anggaran'],
                'kd_klpd' => $key['kd_klpd'],
                'nama_klpd' => $key['nama_klpd'],
                'jenis_klpd' => $key['jenis_klpd'],
                'kd_satker' => $key['kd_satker'],
                'kd_satker_str' => $key['kd_satker_str'],
                'nama_satker' => $key['nama_satker'],
                'kd_lpse' => $key['kd_lpse'],
                'nama_lpse' => $key['nama_lpse'],
                'kd_tender' => $key['kd_tender'],
                'kd_pkt_dce' => $key['kd_pkt_dce'],
                'kd_rup' => $key['kd_rup'],
                'nama_paket' => $key['nama_paket'],
                'pagu' => $key['pagu'],
                'hps' => $key['hps'],
                'sumber_dana' => $key['sumber_dana'],
                'mak' => $key['mak'],
                'kualifikasi_paket' => $key['kualifikasi_paket'],
                'jenis_pengadaan' => $key['jenis_pengadaan'],
                'mtd_pemilihan' => $key['mtd_pemilihan'],
                'mtd_evaluasi' => $key['mtd_evaluasi'],
                'mtd_kualifikasi' => $key['mtd_kualifikasi'],
                'kontrak_pembayaran' => $key['kontrak_pembayaran'],
                'status_tender' => $key['status_tender'],
                'tgl_pengumuman_tender' => $key['tgl_pengumuman_tender'],
                'tgl_penetapan_pemenang' => $key['tgl_penetapan_pemenang'],
                'url_lpse' => $key['url_lpse'],
            ]);

        }

        if ($query) {
            Alert::success('Success', 'Data Tender berhasil disimpan!');
        } else {
            Alert::error('Error', 'Data Tender gagal disimpan!');
        }

        return redirect()->route('tender.index');

    }

    // ini linknya masih down
    public function display_tender_selesai(Request $request)
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb-2/api/jsonujilayanan/1015/tipe/4:4/parameter/'.$ta.':72';

        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];

        foreach ($jsonData as $key) {
            // insert data json to table database
            $query = DB::table('tenderss')->insert([
                'tahun_anggaran' => $key['tahun_anggaran'],
                'kd_klpd' => $key['kd_klpd'],
                'nama_klpd' => $key['nama_klpd'],
                'jenis_klpd' => $key['jenis_klpd'],
                'kd_satker' => $key['kd_satker'],
                'nama_satker' => $key['nama_satker'],
                'kd_lpse' => $key['kd_lpse'],
                'kd_tender' => $key['kd_tender'],
                'kd_paket' => $key['kd_paket'],
                'kd_rup_paket' => $key['kd_rup_paket'],
                'pagu' => $key['pagu'],
                'hps' => $key['hps'],
                'nilai_penawaran' => $key['nilai_penawaran'],
                'nilai_terkoreksi' => $key['nilai_terkoreksi'],
                'nilai_negosiasi' => $key['nilai_negosiasi'],
                'nilai_kontrak' => $key['nilai_kontrak'],
                'tgl_pengumuman_tender' => $key['tgl_pengumuman_tender'],
                'tgl_penetapan_pemenang' => $key['tgl_penetapan_pemenang'],
                'kd_penyedia' => $key['kd_penyedia'],
                'nama_penyedia' => $key['nama_penyedia'],
                'npwp_penyedia' => $key['npwp_penyedia'],
                'nilai_pdn_kontrak' => $key['nilai_pdn_kontrak'],
                'nilai_umk_kontrak' => $key['nilai_umk_kontrak'],

            ]);

        }

        if ($query) {
            Alert::success('Success', 'Data Tender 2 berhasil disimpan!');
        } else {
            Alert::error('Error', 'Data Tender 2 gagal disimpan!');
        }

        return redirect('tender.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}