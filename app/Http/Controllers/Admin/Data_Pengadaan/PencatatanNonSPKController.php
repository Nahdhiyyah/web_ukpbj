<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Alert;

class PencatatanNonSPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'Pengelola Layanan' || $role == 'Super Admin') {

                $non_spk = DB::table('non_spk')->orderBy('tgl_buat_paket', 'desc')->get();

                return view('admin.data_pengadaan.non_spk')->with(
                    'non_spk', $non_spk
                );

            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                return back();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function display_non_spk()
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb-2/api/53e93b95-c017-4312-8ee4-e7c7ce112156/json/10181/SPSE-PencatatanNonTender/tipe/4:4/parameter/'.$ta.':72';
        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];
        DB::table('non_spk')->delete();
        foreach ($jsonData as $key) {
            // insert data json to table database
            $query = DB::table('non_spk')->insert([
                'tahun_anggaran' => $key['tahun_anggaran'],
                'kd_klpd' => $key['kd_klpd'],
                'nama_klpd' => $key['nama_klpd'],
                'jenis_klpd' => $key['jenis_klpd'],
                'kd_satker' => $key['kd_satker'],
                'kd_satker_str' => $key['kd_satker_str'],
                'nama_satker' => $key['nama_satker'],
                'kd_lpse' => $key['kd_lpse'],
                'kd_nontender_pct' => $key['kd_nontender_pct'],
                'kd_pkt_dce' => $key['kd_pkt_dce'],
                'kd_rup' => $key['kd_rup'],
                'nama_paket' => $key['nama_paket'],
                'pagu' => $key['pagu'],
                'total_realisasi' => $key['total_realisasi'],
                'nilai_pdn_pct' => $key['nilai_pdn_pct'],
                'nilai_umk_pct' => $key['nilai_umk_pct'],
                'sumber_dana' => $key['sumber_dana'],
                'uraian_pekerjaan' => $key['uraian_pekerjaan'],
                'informasi_lainnya' => $key['informasi_lainnya'],
                'kategori_pengadaan' => $key['kategori_pengadaan'],
                'mtd_pemilihan' => $key['mtd_pemilihan'],
                'bukti_pembayaran' => $key['bukti_pembayaran'],
                'status_nontender_pct' => $key['status_nontender_pct'],
                'status_nontender_pct_ket' => $key['alasan_pembatalan'],
                'alasan_pembatalan' => $key['alasan_pembatalan'],
                'nip_ppk' => $key['nip_ppk'],
                'nama_ppk' => $key['nama_ppk'],
                'tgl_buat_paket' => $key['tgl_buat_paket'],
                'tgl_mulai_paket' => $key['tgl_mulai_paket'],
                'tgl_selesai_paket' => $key['tgl_selesai_paket'],
            ]);
        }

        if ($query) {
            Alert::success('success', 'Data Non SPK berhasil disimpan!');
        } else {
            Alert::error('error', 'Data Non SPK gagal disimpan!');
        }
        

        return redirect()->route('non_spk.index');

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