<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use App\Http\Controllers\Controller;
use App\Models\Admin\NonTender;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class NonTenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'Pengelola Layanan' || $role == 'Super Admin') {

                $nontender = NonTender::orderBy('id', 'desc')->get();

                return view('admin.data_pengadaan.nontender')->with(
                    'nontender', $nontender
                );

            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

    public function display_nontender(Request $request)
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb-2/api/08f49b34-ebca-4fd1-a799-d90856487821/json/10171/SPSE-NonTenderSelesai/tipe/4:4/parameter/'.$ta.':72';

        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];

        DB::table('non_tenders')->delete();

        foreach ($jsonData as $key) {
            // insert data json to table database
            $query = DB::table('non_tenders')->insert([
                'tahun_anggaran' => $key['tahun_anggaran'],
                'kd_klpd' => $key['kd_klpd'],
                'nama_klpd' => $key['nama_klpd'],
                'jenis_klpd' => $key['jenis_klpd'],
                'kd_satker' => $key['kd_satker'],
                'kd_satker_str' => $key['kd_satker_str'],
                'nama_satker' => $key['nama_satker'],
                'kd_lpse' => $key['kd_lpse'],
                'nama_lpse' => $key['nama_lpse'],
                'kd_nontender' => $key['kd_nontender'],
                'kd_pkt_dce' => $key['kd_pkt_dce'],
                'kd_rup' => $key['kd_rup'],
                'nama_paket' => $key['nama_paket'],
                'pagu' => $key['pagu'],
                'hps' => $key['hps'],
                'nilai_penawaran' => $key['nilai_penawaran'],
                'nilai_terkoreksi' => $key['nilai_terkoreksi'],
                'nilai_negosiasi' => $key['nilai_negosiasi'],
                'nilai_kontrak' => $key['nilai_kontrak'],
                'nilai_pdn_kontrak' => $key['nilai_pdn_kontrak'],
                'nilai_umk_kontrak' => $key['nilai_umk_kontrak'],
                'sumber_dana' => $key['sumber_dana'],
                'mak' => $key['mak'],
                'kualifikasi_paket' => $key['kualifikasi_paket'],
                'jenis_pengadaan' => $key['jenis_pengadaan'],
                'mtd_pemilihan' => $key['mtd_pemilihan'],
                'kontrak_pembayaran' => $key['kontrak_pembayaran'],
                'status_nontender' => $key['status_nontender'],
                'tgl_pengumuman_nontender' => $key['tgl_pengumuman_nontender'],
                'tgl_selesai_nontender' => $key['tgl_selesai_nontender'],
                // 'dibuat_oleh' => $key['dibuat_oleh'],
                // 'nip_pembuat_paket' => $key['nip_pembuat_paket'],
                // 'nama_pembuat_paket' => $key['nama_pembuat_paket'],
                'kd_penyedia' => $key['kd_penyedia'],
                'nama_penyedia' => $key['nama_penyedia'],
                'npwp_penyedia' => $key['npwp_penyedia'],
                'url_lpse' => $key['url_lpse'],
            ]);

        }

        if ($query) {
            Alert::success('success', 'Data Non Tender berhasil disimpan!');
        } else {
            Alert::error('error', 'Data Non Tender gagal disimpan!');
        }

        return redirect('nontender.index');

    }

}