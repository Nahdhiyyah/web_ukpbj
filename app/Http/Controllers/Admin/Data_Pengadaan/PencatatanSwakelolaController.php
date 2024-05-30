<?php

namespace App\Http\Controllers\Admin\Data_Pengadaan;

use App\Http\Controllers\Controller;
use App\Models\Admin\SwakelolaModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class PencatatanSwakelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pagination = 10;

        if (Auth::id()) {
            $role = Auth()->user()->role;
            if ($role == 'admin' || $role == 'super_admin') {
                $ta = date('Y');
                $swakelola = DB::table('swakelolas')
                    ->where('swakelolas.tahun_anggaran', $ta)
                    ->select('swakelolas.kd_rup', 'swakelolas.nama_paket', 'swakelolas.nama_satker', 'swakelolas.pagu', 'swakelolas.total_realisasi', 'swakelolas.status_swakelola_pct_ket')
                    ->get();
                return view('admin.data_pengadaan.swakelola.swakelola')->with([
                    'swakelola' => $swakelola,
                ]);
            } else {
                Alert::error('Error', 'Anda tidak bisa mengakses halaman yang anda tuju!');
                // return view('error');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function display_swakelola(Request $request)
    {
        $ta = date('Y');
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        $url = 'https://isb.lkpp.go.id/isb-2/api/bd182cba-f4fe-41ea-a28c-3a709af0458b/json/10179/SPSE-PencatatanSwakelola/tipe/4:4/parameter/'.$ta.':72';
        $konten = file_get_contents($url, false, stream_context_create($arrContextOptions));
        $jsonData = json_decode($konten, true);
        $finalarray = [];

        DB::table('swakelolas')->delete();
        
        foreach ($jsonData as $key) {
            // insert data json to table database
            $query = DB::table('swakelolas')->insert([
                'tahun_anggaran' => $key['tahun_anggaran'],
                'kd_klpd' => $key['kd_klpd'],
                'nama_klpd' => $key['nama_klpd'],
                'jenis_klpd' => $key['jenis_klpd'],
                'kd_satker' => $key['kd_satker'],
                'kd_satker_str' => $key['kd_satker_str'],
                'nama_satker' => $key['nama_satker'],
                'kd_lpse' => $key['kd_lpse'],
                'kd_swakelola_pct' => $key['kd_swakelola_pct'],
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
                'tipe_swakelola' => $key['tipe_swakelola'],
                'tipe_swakelola_nama' => $key['tipe_swakelola_nama'],
                'status_swakelola_pct' => $key['status_swakelola_pct'],
                'status_swakelola_pct_ket' => $key['status_swakelola_pct_ket'],
                'alasan_pembatalan' => $key['alasan_pembatalan'],
                'nip_ppk' => $key['nip_ppk'],
                'nama_ppk' => $key['nama_ppk'],
                'tgl_buat_paket' => $key['tgl_buat_paket'],
                'tgl_mulai_paket' => $key['tgl_mulai_paket'],
                'tgl_selesai_paket' => $key['tgl_selesai_paket'],
            ]);
        }

        if ($query) {
            Alert::success('success', 'Data Pencatatan Swakelola berhasil disimpan!');
        } else {
            Alert::error('Error', 'Data Pencatatan Swakelola gagal disimpan!');
        }
        // });

        // return redirect('swakelola.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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